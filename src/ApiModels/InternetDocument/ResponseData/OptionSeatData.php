<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class OptionSeatData extends Data
{
    public function __construct(
          public float $volumetricVolume,
          public float $volumetricWidth,
          public float $volumetricLength,
          public float $volumetricHeight,
          public float $weight,
          public float $volumetricWeight,
          public float $cost,
          public bool $specialCargo,
          public ?string $description,
          public ?string $packRef,
) {
    }
}
