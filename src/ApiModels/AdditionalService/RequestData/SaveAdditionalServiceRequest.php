<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\RequestData;

use Sashalenz\NovaPoshtaApi\Enums\OrderType;
use Sashalenz\NovaPoshtaApi\Enums\PayerType;
use Sashalenz\NovaPoshtaApi\Enums\PaymentMethod;
use Sashalenz\NovaPoshtaApi\Enums\ServiceType;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapOutputName(StudlyCaseMapper::class)]
class SaveAdditionalServiceRequest extends Data
{
    public function __construct(
        public string $intDocNumber,
        #[WithCast(EnumCast::class)]
        public PaymentMethod $paymentMethod,
        public string $reason,
        public string $subtypeReason,
        public Optional|string $note,

//        return
        public Optional|string $returnAddressRef,

//        return to new address
        public Optional|string $recipientSettlement,
        public Optional|string $recipientSettlementStreet,
        public Optional|string $buildingNumber,
        public Optional|string $noteAddressRecipient,

//        return to new warehouse
        public Optional|string $recipientWarehouse,

//        redirect
        #[WithCast(EnumCast::class)]
        public Optional|ServiceType $serviceType,
        public Optional|string $recipient,
        public Optional|string $recipientContactName,
        public Optional|string $recipientPhone,
        #[WithCast(EnumCast::class)]
        public PayerType $payerType,

//        change ew
        public Optional|string $senderContactName,
        public Optional|string $senderPhone,

        #[WithCast(EnumCast::class)]
        public OrderType $orderType,
    ) {
    }
}
