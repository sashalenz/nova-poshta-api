<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\RequestData;

use Carbon\Carbon;
use Sashalenz\NovaPoshtaApi\Enums\CargoType;
use Sashalenz\NovaPoshtaApi\Enums\PayerType;
use Sashalenz\NovaPoshtaApi\Enums\PaymentMethod;
use Sashalenz\NovaPoshtaApi\Enums\ServiceType;
use Sashalenz\NovaPoshtaApi\Transformers\CarbonInterfaceTransformer;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapOutputName(StudlyCaseMapper::class)]
class SaveInternetDocumentRequest extends Data
{
    public function __construct(
        public Optional|string $senderWarehouseIndex,
        public Optional|string $recipientWarehouseIndex,
        #[WithCast(EnumCast::class)]
        public PayerType $payerType,
        #[WithCast(EnumCast::class)]
        public PaymentMethod $paymentMethod,
        #[WithTransformer(CarbonInterfaceTransformer::class, 'd.m.Y')]
        public Optional|Carbon $dateTime,
        #[WithCast(EnumCast::class)]
        public CargoType $cargoType,
        #[WithCast(EnumCast::class)]
        public ServiceType $serviceType,

        public Optional|string $volumeGeneral,
        public Optional|string $weight,
        public Optional|int $seatsAmount,
        #[DataCollectionOf(OptionSeatData::class)]
        public Optional|DataCollection $optionsSeat,
        #[DataCollectionOf(CargoDetailData::class)]
        public Optional|DataCollection $cargoDetails,

        public string $description,
        public string $cost,
        public Optional|string $afterpaymentOnGoodsCost,

        public string $citySender,
        public string $sender,
        public string $senderAddress,
        public string $contactSender,
        public string $sendersPhone,

        public string $cityRecipient,
        public string $recipient,
        // Optional: omitted in the NewAddress flow, where the recipient
        // address is built inline from the Recipient* settlement fields
        // below instead of referencing a pre-created address Ref.
        public Optional|string $recipientAddress,
        public string $contactRecipient,
        public string $recipientsPhone,

        public Optional|string $infoRegClientBarcodes,
        public Optional|bool $newAddress,
        public Optional|bool $cash2Card,

        // NewAddress flow (доставка в населений пункт без попередньо
        // створеної адреси). When `newAddress` is true these inline the
        // recipient address. RecipientArea / RecipientAreaRegions /
        // RecipientAddressName are NovaPoshta Refs (UUIDs), not names —
        // Area/Region come from Address.searchSettlements, AddressName is
        // the settlementStreetRef from Address.searchSettlementStreets.
        public Optional|string $recipientCityName,
        public Optional|string $recipientArea,
        public Optional|string $recipientAreaRegions,
        public Optional|string $recipientAddressName,
        public Optional|string $recipientHouse,
        public Optional|string $recipientFlat,
        public Optional|string $settlementType,

        #[DataCollectionOf(BackwardDeliveryData::class)]
        public Optional|DataCollection $backwardDeliveryData,

        public Optional|string $accompanyingDocuments,
        public Optional|string $additionalInformation,
        public Optional|bool $paramsOptionsSeats,
        public Optional|string $promocode,
    ) {
    }
}
