<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\ResponseData;

use Sashalenz\NovaPoshtaApi\Enums\PayerType;
use Sashalenz\NovaPoshtaApi\Enums\PaymentMethod;
use Sashalenz\NovaPoshtaApi\Enums\ServiceType;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
class CheckPossibilityForRedirectingData extends Data
{
    public function __construct(
        public string $ref,
        public string $number,
        #[WithCast(EnumCast::class)]
        public PayerType $payerType,
        #[WithCast(EnumCast::class)]
        public PaymentMethod $paymentMethod,
        #[WithCast(EnumCast::class)]
        public ServiceType $serviceType,
        public string $warehouseRef,
        public string $warehouseDescription,
        public string $cityRecipient,
        public string $cityRecipientDescription,
        public string $settlementRecipient,
        public string $settlementRecipientDescription,
        public string $settlementType,
        public string $counterpartyRecipientRef,
        public string $counterpartyRecipientDescription,
        public string $recipientName,
        public string $phoneSender,
        public string $phoneRecipient,
        public float $documentWeight,
        public string $internationalDeliveryType,
        public string $edrpouRecipient,
        public array $recommendationWarehouses,
    ) {
    }
}
