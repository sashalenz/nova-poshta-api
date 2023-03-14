<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Address\RequestData;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapOutputName(StudlyCaseMapper::class)]
final class GetStreetRequest extends Data
{
    public function __construct(
        #[Uuid, Nullable]
        public Optional|string $cityRef,
        public Optional|string $findByString,
        public ?string $limit = '500',
        public ?string $page = '1'
    ) {
    }
}
