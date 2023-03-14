<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Address\RequestData;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapOutputName(StudlyCaseMapper::class)]
final class GetSettlementsRequest extends Data
{
    public function __construct(
        #[Uuid, Nullable]
        public Optional|string $areaRef,
        #[Uuid, Nullable]
        public Optional|string $ref,
        #[Uuid, Nullable]
        public Optional|string $regionRef,
        public Optional|string $findByString,
        public ?string $warehouse = '1',
        public ?string $limit = '150',
        public ?string $page = '1'
    ) {
    }
}
