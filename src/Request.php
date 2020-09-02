<?php

namespace Sashalenz\NovaPoshtaApi;

use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;
use Cache;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class Request
{
    private const TIMEOUT = 3;
    private const RETRY_TIMES = 3;
    private const RETRY_SLEEP = 100;

    private string $apiKey;
    private string $calledMethod;
    private string $modelName;
    private Collection $methodProperties;

    /**
     * Request constructor.
     * @param $apiKey
     * @param $modelName
     * @param $calledMethod
     * @param $methodProperties
     */
    public function __construct($apiKey, $modelName, $calledMethod, $methodProperties)
    {
        $this->apiKey = $apiKey;
        $this->calledMethod = $calledMethod;
        $this->modelName = $modelName;
        $this->methodProperties = $methodProperties;
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function make() : Collection
    {
        try {
            $requestParams = array_filter([
                'apiKey' => $this->apiKey,
                'modelName' => $this->modelName,
                'calledMethod' => $this->calledMethod,
                'methodProperties' => $this->methodProperties->count()
                    ? $this->methodProperties->toArray()
                    : null,
            ]);

            $response = Http::timeout(self::TIMEOUT)
                ->retry(self::RETRY_TIMES, self::RETRY_SLEEP)
                ->post(config('services.novaposhta.url'), $requestParams)
                ->throw();
        } catch (RequestException $e) {
            throw new NovaPoshtaException('Request error. '.$e->getMessage());
        }

        if ($response['errors']) {
            throw new NovaPoshtaException('API error. '.$response['errors'][0]);
        }

        if ($response['success'] !== true) {
            throw new NovaPoshtaException('API response not success.');
        }

        if (!isset($response['data'])) {
            throw new NovaPoshtaException('API response data not found.');
        }

        if (!empty($response['warnings'])) {
            info($response['warnings']);
        }

//        info(print_r($response['data'],1));

        return collect($response['data']);
    }

    /**
     * @param int $seconds
     * @return Collection
     */
    public function cache(int $seconds = -1) : Collection
    {
        if ($seconds === -1) {
            return Cache::rememberForever($this->getCacheKey(), fn () => $this->make());
        }

        return Cache::remember($this->getCacheKey(), $seconds, fn () => $this->make());
    }

    /**
     * @return string
     */
    private function getCacheKey() : string
    {
        return $this->modelName.'_'.$this->calledMethod.':'.$this->methodProperties->values()->implode('_');
    }
}
