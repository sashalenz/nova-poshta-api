<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\ResponseData;

use Sashalenz\NovaPoshtaApi\Enums\CargoType;
use Sashalenz\NovaPoshtaApi\Enums\PayerType;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class BackwardDeliveryData extends Data
{
    public function __construct(
        public string $cargoType,
        #[WithCast(EnumCast::class)]
        public CargoType $cargoTypeRef,
        public string $redeliveryString,
        public string $type,
        public string $typeRef,
        public string $payerType,
        #[WithCast(EnumCast::class)]
        public PayerType $payerTypeRef,
        public string $customBackwardDeliveryParameter,
        public string $customBackwardDeliveryParameterRef,
    ) {
    }
}
