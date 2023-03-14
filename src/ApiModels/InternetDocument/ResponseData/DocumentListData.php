<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\ResponseData;

use Carbon\Carbon;
use Sashalenz\NovaPoshtaApi\Casts\CarbonInterfaceCast;
use Sashalenz\NovaPoshtaApi\Enums\CargoType;
use Sashalenz\NovaPoshtaApi\Enums\CounterpartyType;
use Sashalenz\NovaPoshtaApi\Enums\PayerType;
use Sashalenz\NovaPoshtaApi\Enums\PaymentMethod;
use Sashalenz\NovaPoshtaApi\Enums\ServiceType;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapInputName(StudlyCaseMapper::class)]
final class DocumentListData extends Data
{
    public function __construct(
        public string $ref,
        public Optional|string $number,
        public bool $deletionMark,
        #[WithCast(CarbonInterfaceCast::class, format: 'Y-m-d H:i:s')]
        public ?Carbon $dateTime,
        #[WithCast(CarbonInterfaceCast::class, format: 'Y-m-d H:i:s')]
        public ?Carbon $preferredDeliveryDate,
        public float $weight,
        public int $seatsAmount,
        public string $intDocNumber,
        public float $cost,
        #[WithCast(EnumCast::class)]
        public ServiceType $serviceType,
        public string $description,
        public string $citySender,
        public string $cityRecipient,
        public Optional|string $state,
        public string $senderAddress,
        public string $recipientAddress,
        public string $sender,
        public string $contactSender,
        public string $recipient,
        public string $contactRecipient,
        public float $costOnSite,
        #[WithCast(EnumCast::class)]
        public PayerType $payerType,
        #[WithCast(EnumCast::class)]
        public PaymentMethod $paymentMethod,
        public float $afterpaymentOnGoodsCost,
        #[WithCast(EnumCast::class)]
        public CargoType $cargoType,
        public string $packingNumber,
        public string $additionalInformation,
        public string $sendersPhone,
        public string $recipientsPhone,
        public Optional|string $loyaltyCard,
        public ?string $posted,
        public ?string $route,
        public ?string $eWNumber,
        public ?string $saturdayDelivery,
        public ?string $expressWaybill,
        public ?string $carCall,
        public ?string $deliveryDateFrom,
        public ?string $vip,
        public ?string $lastModificationDate,
        public ?string $receiptDate,
        public ?string $redelivery,
        public ?string $saturdayDeliveryString,
        public ?string $note,
        public ?string $thirdPerson,
        public ?string $forwarding,
        public ?string $numberOfFloorsLifting,
        public ?string $statementOfAcceptanceTransferCargoID,
        public ?string $settlementSender,
        public ?string $settlementRecipient,
        public ?string $warehouseSender,
        public ?string $warehouseRecipient,
        public int $stateId,
        public string $stateName,
        public ?string $recipientFullName,
        public ?string $recipientPost,
        #[WithCast(CarbonInterfaceCast::class, format: 'Y-m-d H:i:s')]
        public ?Carbon $recipientDateTime,
        public ?string $rejectionReason,
        public string $citySenderDescription,
        public string $cityRecipientDescription,
        public string $senderDescription,
        public string $recipientDescription,
        public string $recipientContactPhone,
        public string $recipientContactPerson,
        public string $senderContactPerson,
        public string $senderAddressDescription,
        public string $recipientAddressDescription,
        public bool $printed,
        public bool $changedDataEW,
        #[WithCast(CarbonInterfaceCast::class, format: 'Y-m-d H:i:s')]
        public ?Carbon $eWDateCreated,
        #[WithCast(CarbonInterfaceCast::class, format: 'Y-m-d H:i:s')]
        public ?Carbon $scheduledDeliveryDate,
        #[WithCast(CarbonInterfaceCast::class, format: 'Y-m-d H:i:s')]
        public ?Carbon $estimatedDeliveryDate,
        public string $regionCode,
        #[WithCast(CarbonInterfaceCast::class, format: 'Y-m-d H:i:s')]
        public ?Carbon $dateLastUpdatedStatus,
        #[WithCast(CarbonInterfaceCast::class, format: 'Y-m-d H:i:s')]
        public ?Carbon $dateLastPrint,
        #[WithCast(CarbonInterfaceCast::class, format: 'Y-m-d H:i:s')]
        public ?Carbon $createTime,
        public string $scanSheetNumber,
        public string $scanSheetPrinted,
        public string $infoRegClientBarcodes,
        public string $statePayId,
        public string $statePayName,
        public string $backwardDeliveryCargoType,
        public string $backwardDeliverySum,
        public float $backwardDeliveryMoney,
        #[DataCollectionOf(BackwardDeliveryData::class)]
        public DataCollection $backwardDeliveryDataDocuments,
        public Optional|string $senderEDRPOU,
        #[WithCast(EnumCast::class)]
        public Optional|CounterpartyType $senderCounterpartyType,
        public bool $elevatorRecipient,
        #[WithCast(EnumCast::class)]
        public Optional|CounterpartyType $recipientCounterpartyType,
        public bool $deliveryByHand,
        public int $forwardingCount,
        public OriginalGeoData $originalGeoData,
        public string $ownershipForm,
        public string $EDRPOU,
        public string $redBoxBarcode,
        public string $recipientCityRef,
        public string $recipientStreetRef,
        public string $recipientWarehouseRef,
        public string $isTakeAttorney,
        public string $sameDayDelivery,
        public string $timeInterval,
        public string $timeIntervalRef,
        public string $timeIntervalString,
        public string $expressPallet,
        public bool $aviaDelivery,
        public string $system,
        public bool $securePayment,
        public string $promocode,
        public bool $specialCargo,
        public string $ageIdentification,
        public bool $lightReturn,
        public SettlementAddressData $settlmentAddressData,
        #[DataCollectionOf(OptionSeatData::class)]
        public DataCollection $optionsSeat,
) {
    }
}
