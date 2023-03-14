<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\ResponseData;

use Sashalenz\NovaPoshtaApi\Enums\PayerType;
use Sashalenz\NovaPoshtaApi\Enums\PaymentMethod;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
class CheckPossibilityChangeEWData extends Data
{
    public function __construct(
        public bool $canChangeSender,
        public bool $canChangeRecipient,
        public bool $canChangePayerTypeOrPaymentMethod,
        public bool $canChangeBackwardDeliveryDocuments,
        public bool $canChangeBackwardDeliveryMoney,
        public bool $canChangeCash2Card,
        public bool $canChangeBackwardDeliveryOther,
        public bool $canChangeBackwardDeliveryCreditDocuments,
        public bool $canChangeAfterpaymentType,
        public bool $canChangeLiftingOnFloor,
        public bool $canChangeLiftingOnFloorWithElevator,
        public bool $canChangeFillingWarranty,
        public string $senderCounterparty,
        public string $contactPersonSender,
        public string $senderPhone,
        public string $recipientCounterparty,
        public string $contactPersonRecipient,
        public string $recipientPhone,
        #[WithCast(EnumCast::class)]
        public PayerType $payerType,
        #[WithCast(EnumCast::class)]
        public PaymentMethod $paymentMethod,
        public array $backwardDeliveryData,
        public bool $blockChangeSenderDataIfAvailableCargoTypeMoney,
        public float $afterpaymentOnGoodsCost,
        public int $numberOfFloorsLifting,
        public bool $elevator,
        public bool $fillingWarranty,
        public string $edrpouRecipient,
        public string $edrpouSender,
    ) {
    }
}
