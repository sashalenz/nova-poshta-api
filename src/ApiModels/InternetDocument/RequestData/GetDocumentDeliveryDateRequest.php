<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\RequestData;

use Carbon\Carbon;
use Sashalenz\NovaPoshtaApi\Enums\ServiceType;
use Sashalenz\NovaPoshtaApi\Transformers\CarbonInterfaceTransformer;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapOutputName(StudlyCaseMapper::class)]
final class GetDocumentDeliveryDateRequest extends Data
{
    public function __construct(
        public string $citySender,
        public string $cityRecipient,
        #[WithCast(EnumCast::class)]
        public ServiceType $serviceType,
        #[WithTransformer(CarbonInterfaceTransformer::class, format: 'd.m.Y')]
        public Optional|Carbon $dateTime,
    ) {
    }
}
