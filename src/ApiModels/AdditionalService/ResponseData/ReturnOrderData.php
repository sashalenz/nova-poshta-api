<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\ResponseData;

use Carbon\Carbon;
use Sashalenz\NovaPoshtaApi\Casts\CarbonInterfaceCast;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class ReturnOrderData extends Data
{
    public function __construct(
        public string $orderRef,
        public string $orderNumber,
        #[WithCast(CarbonInterfaceCast::class, format: 'd.m.Y H:i:s')]
        public ?Carbon $dateTime,
        public string $orderStatus,
        public string $documentNumber,
        public string $counterpartyRecipient,
        public string $contactPersonRecipient,
        public string $recipientPhone,
        public string $addressRecipient,
        public bool $canDeleteOrder,
        public string $expressWaybillNumber,
        public float $deliveryCost,
        #[WithCast(CarbonInterfaceCast::class, format: 'd.m.Y')]
        public ?Carbon $estimatedDeliveryDate,
        public string $expressWaybillStatus,
    ) {
    }
}
