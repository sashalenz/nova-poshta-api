<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class SettlementAddressData extends Data
{
    public function __construct(
        public string $senderWarehouseRef,
        public string $recipientWarehouseRef,
        public string $senderWarehouseNumber,
        public string $senderWarehouseIndex,
        public string $recipientWarehouseNumber,
        public string $recipientWarehouseIndex,
        public string $senderSettlementRef,
        public string $recipientSettlementRef,
        public string $senderSettlementDescription,
        public string $recipientSettlementDescription,
        public string $senderSettlementStreetDescription,
        public string $recipientSettlementStreetDescription,
        public string $senderSettlementStreetRef,
        public string $recipientSettlementStreetRef,
        public string $senderHouseNumber,
        public string $recipientHouseNumber,
        public string $senderFlatNumber,
        public string $recipientFlatNumber,
        public string $senderAddressNote,
        public string $recipientAddressNote,
    ) {
    }
}
