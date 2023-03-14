<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\ResponseData;

use Carbon\Carbon;
use Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\RequestData\CargoDetailData;
use Sashalenz\NovaPoshtaApi\Casts\CarbonInterfaceCast;
use Sashalenz\NovaPoshtaApi\Enums\CargoType;
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
final class DocumentData extends Data
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
        public ServiceType $serviceTypeRef,
        public string $serviceType,
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
        public PaymentMethod $paymentMethodRef,
        public string $paymentMethod,
        #[WithCast(EnumCast::class)]
        public CargoType $cargoTypeRef,
        public string $cargoType,
        #[WithCast(EnumCast::class)]
        public PayerType $payerTypeRef,
        public string $payerType,
        public float $afterpaymentOnGoodsCost,
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
        public bool $printed,
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
        public string $infoRegClientBarcodes,
        public Optional|string $senderEDRPOU,
        public bool $deliveryByHand,
        public string $forwardingCount,
        public OriginalGeoData $originalGeoData,
        public string $redBoxBarcode,
        public string $recipientCityRef,
        public string $recipientStreetRef,
        public string $recipientWarehouseRef,
        public string $isTakeAttorney,
        public string $sameDayDelivery,
        public ?string $timeInterval,
        public ?string $timeIntervalRef,
        public ?string $timeIntervalString,
        public string $expressPallet,
        public bool $aviaDelivery,
        public string $system,
        public bool $securePayment,
        public string $promocode,
        public bool $specialCargo,
        public string $ageIdentification,
        public string $vipRef,
        public string $senderRef,
        public string $contactSenderRef,
        public string $recipientRef,
        public string $contactRecipientRef,
        public string $thirdPersonRef,
        public string $areaSenderRef,
        public string $areaRecipientRef,
        public string $senderAddressRef,
        public string $recipientAddressRef,
        public string $senderWarehouseNumber,
        public string $recipientWarehouseNumber,
        public string $senderWarehouseIndex,
        public string $recipientWarehouseIndex,
        public string $customerNote,
        public string $volumeGeneral,
        public string $numberOfFloorsDescent,
        public string $marketPlaceSecurePayment,
        public bool $elevator,
        public string $paymentCardToken,
        public bool $redBoxPayerRecipient,
        public string $cash2CardPAN,
        public string $addressDefinition,
        public string $internationalZipCode,
        public string $incoterms,
        public string $currency,
        public string $originalDimensionalWeight,
        public string $originalActualWeight,
        public string $internationalWarehouse,
        public string $originalRecipientAddress,
        public string $internationalServiceType,
        public string $internationalReason,
        public string $internationalReasonAttachments,
        public string $partialReturn,
        public string $recipientTypeOfWarehouse,
        public string $recipientCategoryOfWarehouse,
        public string $accompanyingDocuments,
        public ?string $pack,
        public ?string $fulfillment,
        public ?string $fillingWarranty,
        public string $senderOwnershipForm,
        public string $conglomeratesSenderRef,
        public string $recipientEDRPOU,
        public string $regionCity,
        public string $regionalRecipientFilial,
        public string $customReturnAddressRef,
        public string $volumeWeight,
        public string $lightReturnNumber,
        #[DataCollectionOf(BackwardDeliveryData::class)]
        public DataCollection $backwardDeliveryData,
        #[DataCollectionOf(CargoDetailData::class)]
        public DataCollection $cargoDetails,
        #[DataCollectionOf(OptionSeatData::class)]
        public DataCollection $optionsSeat,
    ) {
    }
}
