<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Address\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

final class Location extends Data
{
    public function __construct(
        public string $lat,
        #[MapInputName('lon')]
        public string $lng
    ) {
    }
}
