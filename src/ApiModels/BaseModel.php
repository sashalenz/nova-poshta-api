<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels;

use Illuminate\Support\Traits\Conditionable;
use ReflectionClass;
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;
use Sashalenz\NovaPoshtaApi\Request;
use Spatie\LaravelData\Contracts\BaseData;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Resolvers\DataFromArrayResolver;
use Spatie\LaravelData\Resolvers\DataFromSomethingResolver;

abstract class BaseModel
{
    use Conditionable;

    protected string $modelName;

    protected string $calledMethod;

    protected string $apiKey;

    protected bool $canBeCached = false;

    protected int $cacheSeconds = -1;

    protected ?Data $requestParams = null;

    public function __construct(?string $apiKey = null)
    {
        $class = new ReflectionClass($this);
        $this->modelName = $class->getShortName();

        $this->apiKey = $apiKey ?? config('nova-poshta-api.api_key');
    }

    public function cache(int $seconds = -1): self
    {
        $this->canBeCached = true;
        $this->cacheSeconds = $seconds;

        return $this;
    }

    protected function calledMethod(string $calledMethod): self
    {
        $this->calledMethod = $calledMethod;

        return $this;
    }

    protected function params(?Data $params = null): self
    {
        $this->requestParams = $params;

        return $this;
    }

    /**
     * @throws NovaPoshtaException
     */
    private function request(): array
    {
        $request = new Request(
            apiKey: $this->apiKey,
            modelName: $this->modelName,
            calledMethod: $this->calledMethod,
            methodProperties: $this->requestParams?->toArray()
        );

        if ($this->canBeCached) {
            return $request->cache($this->cacheSeconds);
        }

        return $request->make();
    }

    /**
     * @throws NovaPoshtaException
     */
    protected function get(): array
    {
        return $this->request();
    }

    /**
     * @throws NovaPoshtaException
     */
    protected function first(): array
    {
        return $this->request()[0] ?? [];
    }

    /**
     * @throws NovaPoshtaException
     */
    protected function toData(
        /** @var class-string<BaseData> $class */
        string $class
    ): BaseData {
        return (new DataCollection($class, $this->request()))->first();
    }

    /**
     * @throws NovaPoshtaException
     */
    protected function toCollection(
        /** @var class-string<BaseData> $class */
        string $class
    ): DataCollection {
        return new DataCollection($class, $this->request());
    }

    public static function make(?string $apiKey = null): static
    {
        return new static($apiKey);
    }
}
