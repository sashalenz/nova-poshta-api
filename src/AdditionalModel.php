<?php

namespace Sashalenz\NovaPoshta;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

abstract class AdditionalModel
{

    /**
     * @return Collection
     */
    protected function getMethodProperties() : Collection
    {
        $properties = array_diff_key(get_object_vars($this), get_class_vars(get_parent_class($this)));

        return collect($properties)
            ->mapWithKeys(fn ($property, $key) => [
                Str::ucfirst($key) => $property
            ]);
    }


    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->getMethodProperties()->toArray();
    }

    /**
     * @return static
     */
    public static function make()
    {
        return new static();
    }

}
