<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Address\RequestData;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
final class SearchSettlementsRequest extends Data
{
    public function __construct(
        public string $cityName,
        public ?string $limit = '50',
        public ?string $page = '1'
    ) {
    }
}
