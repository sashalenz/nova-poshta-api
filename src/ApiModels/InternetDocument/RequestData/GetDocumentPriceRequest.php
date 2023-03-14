<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\RequestData;

use Carbon\Carbon;
use Sashalenz\NovaPoshtaApi\Casts\CarbonInterfaceCast;
use Sashalenz\NovaPoshtaApi\Enums\CargoType;
use Sashalenz\NovaPoshtaApi\Enums\ServiceType;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapOutputName(StudlyCaseMapper::class)]
final class GetDocumentPriceRequest extends Data
{
    public function __construct(
        public string $citySender,
        public string $cityRecipient,
        public float $weight,
        #[WithCast(EnumCast::class)]
        public ServiceType $serviceType,
        public float $cost,
        #[WithCast(EnumCast::class)]
        public CargoType $cargoType,
        public int $seatsAmount,
        public Optional|RedeliveryCalculateData $redeliveryCalculate,
        public Optional|int $packCount,
        public Optional|string $packRef,
        public Optional|float $amount,
        #[DataCollectionOf(CargoDetailData::class)]
        public Optional|DataCollection $cargoDetails,
        public Optional|string $cargoDescription,
        #[WithCast(CarbonInterfaceCast::class, format: 'd.m.Y')]
        public Optional|Carbon $dateTime,
    ) {
    }
}
