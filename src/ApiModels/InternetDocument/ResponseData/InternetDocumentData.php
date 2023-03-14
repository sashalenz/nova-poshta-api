<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\ResponseData;

use Carbon\Carbon;
use Sashalenz\NovaPoshtaApi\Casts\CarbonInterfaceCast;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class InternetDocumentData extends Data
{
    public function __construct(
        public float $costOnSite,
        #[WithCast(CarbonInterfaceCast::class, format: 'd.m.Y')]
        public ?Carbon $estimatedDeliveryDate,
        public string $intDocNumber,
        public string $ref,
        public string $typeDocument,
    ) {
    }
}
