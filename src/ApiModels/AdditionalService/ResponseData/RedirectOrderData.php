<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\ResponseData;

use Carbon\Carbon;
use Sashalenz\NovaPoshtaApi\Casts\CarbonInterfaceCast;
use Sashalenz\NovaPoshtaApi\Enums\PayerType;
use Sashalenz\NovaPoshtaApi\Enums\PaymentMethod;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class RedirectOrderData extends Data
{
    public function __construct(
        public string $orderRef,
        public string $orderNumber,
        #[WithCast(CarbonInterfaceCast::class, format: 'd.m.Y H:i:s')]
        public ?Carbon $dateTime,
        public string $orderStatus,
        public string $documentNumber,
        public string $note,
        public string $cityRecipient,
        public string $recipientAddress,
        public string $counterpartyRecipient,
        public string $recipientName,
        public string $phoneRecipient,
        #[WithCast(EnumCast::class)]
        public PayerType $payerType,
        #[WithCast(EnumCast::class)]
        public PaymentMethod $paymentMethod,
        public bool $canDeleteOrder,
        public string $expressWaybillNumber,
        public float $deliveryCost,
        #[WithCast(CarbonInterfaceCast::class, format: 'd.m.Y')]
        public ?Carbon $estimatedDeliveryDate,
        public string $expressWaybillStatus,
    ) {
    }
}
