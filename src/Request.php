<?php

namespace Sashalenz\NovaPoshtaApi;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;

final class Request
{
    private const TIMEOUT = 3;

    private const RETRY_TIMES = 3;

    private const RETRY_SLEEP = 100;

    public function __construct(
        private readonly string $apiKey,
        private readonly string $modelName,
        private readonly string $calledMethod,
        private readonly ?array $methodProperties
    ) {
    }

    /**
     * @throws NovaPoshtaException
     */
    public function make(): array
    {
        try {
            $response = Http::timeout(self::TIMEOUT)
                ->retry(
                    self::RETRY_TIMES,
                    self::RETRY_SLEEP
                )
                ->baseUrl(config('nova-poshta-api.url'))
                ->post('/', [
                    'apiKey' => $this->apiKey,
                    'modelName' => $this->modelName,
                    'calledMethod' => $this->calledMethod,
                    'methodProperties' => $this->methodProperties,
                ])
                ->throw()
                ->collect();
        } catch (RequestException $e) {
            throw new NovaPoshtaException('Request error. '.$e->getMessage());
        }

        if ($errors = $response->get('errors')) {
            throw new NovaPoshtaException('API error. '.$errors[0]);
        }

        if ($response->get('success') !== true) {
            throw new NovaPoshtaException('API response not success.');
        }

        return $response->get('data');
    }

    public function cache(int $seconds = -1): array
    {
        if ($seconds === -1) {
            return Cache::rememberForever($this->getCacheKey(), fn () => $this->make());
        }

        return Cache::remember($this->getCacheKey(), $seconds, fn () => $this->make());
    }

    private function getCacheKey(): string
    {
        return collect([
            $this->modelName,
            $this->calledMethod,
        ])
            ->when(
                ! is_null($this->methodProperties),
                fn ($collection) => $collection->push(
                    base64_encode(serialize($this->methodProperties))
                )
            )
            ->implode('_');
    }
}
