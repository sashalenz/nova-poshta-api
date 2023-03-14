<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Address\RequestData;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapOutputName(StudlyCaseMapper::class)]
final class GetWarehousesRequest extends Data
{
    public function __construct(
        public Optional|bool $bicycleParking,
        public Optional|string $typeOfWarehouseRef,
        public Optional|bool $postFinance,
        public Optional|bool $POSTerminal,
        public Optional|string $cityName,
        #[Uuid, Nullable]
        public Optional|string $cityRef,
        public Optional|string $warehouseId,
        public Optional|string $findByString,
        #[Uuid, Nullable]
        public Optional|string $ref,
        #[Uuid, Nullable]
        public Optional|string $settlementRef,
        public Optional|string $limit
    ) {
    }
}
