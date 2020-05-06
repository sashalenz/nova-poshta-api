<?php

namespace A20\Services\NovaPoshta;

use A20\Services\NovaPoshta\Exceptions\NovaPoshtaException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionException;

abstract class BaseModel
{
    protected string $modelName;
    protected string $calledMethod;
    protected string $apiKey;

    protected bool $canBeCached = false;
    protected int $cacheSeconds = -1;

    /**
     * BaseModel constructor.
     * @throws NovaPoshtaException
     */
    public function __construct()
    {
        try {
            $class = new ReflectionClass($this);
            $this->modelName = $class->getShortName();
        } catch (ReflectionException $e) {
            throw new NovaPoshtaException($e->getMessage());
        }
        $this->apiKey = Config::get('services.novaposhta.key');
    }

    /**
     * @param int $seconds
     * @return $this
     */
    public function cache(int $seconds = -1) : self
    {
        $this->canBeCached = true;
        $this->cacheSeconds = $seconds;

        return $this;
    }

    /**
     * @param $apiKey
     * @return $this
     */
    public function setApiKey($apiKey) : self
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * @param $method
     * @return $this
     */
    protected function setCalledMethod($method) : self
    {
        $this->calledMethod = $method;

        return $this;
    }

    /**
     * @return Collection
     */
    protected function getMethodProperties() : Collection
    {
        $properties = array_diff_key(get_object_vars($this), get_class_vars(get_parent_class($this)));

        return collect($properties)
            ->mapWithKeys(fn ($property, $key) => [Str::ucfirst($key) => $property]);
    }

    /**
     * @param array $rules
     * @throws NovaPoshtaException
     */
    protected function validate($rules = [])
    {
        $validator = Validator::make($this->getMethodProperties()->toArray(), $rules);

        if ($validator->fails()) {
            throw new NovaPoshtaException($validator->errors()->first());
        }
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function request() : Collection
    {
        $request = new Request($this->apiKey, $this->modelName, $this->calledMethod, $this->getMethodProperties());

        if ($this->canBeCached) {
            return $request->cache($this->cacheSeconds);
        }

        return $request->make();
    }
}
