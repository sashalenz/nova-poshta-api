<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\ResponseData;

use Carbon\Carbon;
use Sashalenz\NovaPoshtaApi\Casts\CarbonInterfaceCast;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapInputName(StudlyCaseMapper::class)]
final class ChangeEWOrderData extends Data
{
    public function __construct(
        public string $orderRef,
        public string $orderNumber,
        #[WithCast(CarbonInterfaceCast::class, format: 'Y-m-d H:i:s')]
        public ?Carbon $dateTime,
        public string $orderStatus,
        public string $documentNumber,
        public float $cost,
        public bool $canDeleteOrder,
        public Optional|string $beforeChangeRecipientPhone,
        public Optional|string $afterChangeRecipientPhone,
        public Optional|string $beforeChangeRecipientContactPerson,
        public Optional|string $afterChangeRecipientContactPerson,
) {
    }
}
