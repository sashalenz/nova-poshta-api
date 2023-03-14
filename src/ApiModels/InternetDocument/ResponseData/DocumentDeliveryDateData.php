<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\ResponseData;

use Carbon\Carbon;
use Sashalenz\NovaPoshtaApi\Casts\CarbonInterfaceCast;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class DocumentDeliveryDateData extends Data
{
    public function __construct(
        #[WithCast(CarbonInterfaceCast::class, format: 'Y-m-d H:i:s.u')]
        public ?Carbon $deliveryDate,
    ) {
    }
}
