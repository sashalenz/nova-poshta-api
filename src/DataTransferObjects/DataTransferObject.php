<?php

namespace Sashalenz\NovaPoshta\DataTransferObjects;

use Illuminate\Support\Collection;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

abstract class DataTransferObject extends FlexibleDataTransferObject
{
    abstract public static function fromArray($array);

    /**
     * @param $array
     * @return Collection
     */
    public static function arrayFromArray($array) : Collection
    {
        return collect($array)
            ->map(fn ($parameters) => static::fromArray($parameters));
    }
}
