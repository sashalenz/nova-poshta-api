<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\TrackingDocument\ResponseData;

use Carbon\Carbon;
use Sashalenz\NovaPoshtaApi\Casts\CarbonInterfaceCast;
use Sashalenz\NovaPoshtaApi\Enums\CargoType;
use Sashalenz\NovaPoshtaApi\Enums\PayerType;
use Sashalenz\NovaPoshtaApi\Enums\PaymentMethod;
use Sashalenz\NovaPoshtaApi\Enums\ServiceType;
use Sashalenz\NovaPoshtaApi\Transformers\CarbonInterfaceTransformer;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapInputName(StudlyCaseMapper::class)]
final class StatusDocumentData extends Data
{
    public function __construct(
        public string $counterpartyRecipientDescription,
        public float $documentWeight,
        #[WithCast(EnumCast::class)]
        public ServiceType $serviceType,
        public string $undeliveryReasons,
        public string $recipientFullName,
        public string $factualWeight,
        public string $marketplacePartnerToken,
        public string $counterpartySenderDescription,
        public string $internationalDeliveryType,
        #[WithCast(EnumCast::class)]
        public CargoType $cargoType,
        #[WithCast(EnumCast::class)]
        public PayerType $payerType,
        public int $seatsAmount,
        #[WithCast(CarbonInterfaceCast::class, format: 'd-m-Y H:i:s'), WithTransformer(CarbonInterfaceTransformer::class, format: 'd-m-Y H:i:s')]
        public ?Carbon $scheduledDeliveryDate,
        public float $documentCost,
        public string $cardMaskedNumber,
        public string $ownerDocumentType,
        public string $expressWaybillPaymentStatus,
        public string $expressWaybillAmountToPay,
        public string $afterpaymentOnGoodsCost,
        public float $sumBeforeCheckWeight,
        public float $checkWeight,
        #[WithCast(EnumCast::class)]
        public PaymentMethod $paymentMethod,
        public string $adjustedDate,
        public string $number,
        #[WithCast(CarbonInterfaceCast::class, format: 'Y-m-d H:i:s'), WithTransformer(CarbonInterfaceTransformer::class, format: 'd-m-Y H:i:s')]
        public ?Carbon $trackingUpdateDate,
        public string $calculatedWeight,
        public string $warehouseRecipient,
        public string $warehouseSender,
        #[WithCast(CarbonInterfaceCast::class, format: 'd-m-Y H:i:s'), WithTransformer(CarbonInterfaceTransformer::class, format: 'd-m-Y H:i:s')]
        public ?Carbon $dateCreated,
        #[WithCast(CarbonInterfaceCast::class, format: 'H:i d.m.Y'), WithTransformer(CarbonInterfaceTransformer::class, format: 'd-m-Y H:i')]
        public ?Carbon $dateScan,
        public Optional|string $dateReturnCargo,
        public string $dateMoving,
        #[WithCast(CarbonInterfaceCast::class, format: 'Y-m-d'), WithTransformer(CarbonInterfaceTransformer::class, format: 'd-m-Y')]
        public ?Carbon $dateFirstDayStorage,
        #[WithCast(CarbonInterfaceCast::class, format: 'Y-m-d H:i:s'), WithTransformer(CarbonInterfaceTransformer::class, format: 'd-m-Y H:i:s')]
        public ?Carbon $datePayedKeeping,
        public string $recipientAddress,
        #[WithCast(CarbonInterfaceCast::class, format: 'd-m-Y H:i:s'), WithTransformer(CarbonInterfaceTransformer::class, format: 'd-m-Y H:i:s')]
        public ?Carbon $recipientDateTime,
        public string $refCityRecipient,
        public string $refCitySender,
        public string $refSettlementRecipient,
        public string $refSettlementSender,
        public string $senderAddress,
        public string $clientBarcode,
        public string $citySender,
        public string $cityRecipient,
        public string $cargoDescriptionString,
        public string $announcedPrice,
        public string $additionalInformationEW,
        #[WithCast(CarbonInterfaceCast::class, format: 'Y-m-d H:i:s'), WithTransformer(CarbonInterfaceTransformer::class, format: 'd-m-Y H:i:s')]
        public ?Carbon $actualDeliveryDate,
        public int $statusCode,
        public bool $postomatV3CellReservationNumber,
        public string $amountToPay,
        public string $amountPaid,
        public string $refEW,
        public float $volumeWeight,
        public string $checkWeightMethod,
        public string $ownerDocumentNumber,
        public string $lastCreatedOnTheBasisNumber,
        #[WithCast(CarbonInterfaceCast::class, format: 'Y-m-d H:i:s'), WithTransformer(CarbonInterfaceTransformer::class, format: 'd-m-Y H:i:s')]
        public ?Carbon $lastCreatedOnTheBasisDateTime,
        #[WithCast(CarbonInterfaceCast::class, format: 'Y-m-d H:i:s'), WithTransformer(CarbonInterfaceTransformer::class, format: 'd-m-Y H:i:s')]
        public ?Carbon $lastTransactionDateTimeGM,
        public string $paymentStatus,
        #[WithCast(CarbonInterfaceCast::class, format: 'Y-m-d H:i:s'), WithTransformer(CarbonInterfaceTransformer::class, format: 'd-m-Y H:i:s')]
        public ?Carbon $paymentStatusDate,
        public string $lastAmountTransferGM,
        public string $lastAmountReceivedCommissionGM,
        public string $lastCreatedOnTheBasisPayerType,
        public string $deliveryTimeframe,
        public string $lastTransactionStatusGM,
        public string $status,
        public string $createdOnTheBasis,
        public bool $redelivery,
        public string $redeliveryNum,
        public string $redeliverySum,
        public string $redeliveryPayer,
        public string $undeliveryReasonsDate,
        public string $undeliveryReasonsSubtypeDescription,
        public string $recipientWarehouseTypeRef,
        public string $warehouseRecipientInternetAddressRef,
        public int $warehouseRecipientNumber,
        public string $warehouseRecipientRef,
        public string $categoryOfWarehouse,
        public string $warehouseRecipientAddress,
        public string $warehouseSenderInternetAddressRef,
        public string $warehouseSenderAddress,
        public string $counterpartyType,
        public string $counterpartySenderType,
        public bool $aviaDelivery,
        public string $barcodeRedBox,
        public bool $cargoReturnRefusal,
        public string $daysStorageCargo,
        public array $packaging,
        public array $partialReturnGoods,
        public bool $securePayment,
        public string $storageAmount,
        public string $storagePrice,
        public bool $possibilityCreateRedirecting,
        public bool $possibilityCreateReturn,
        public bool $possibilityCreateRefusal,
        public bool $possibilityChangeEW,
        public bool $possibilityChangeCash2Card,
        public bool $possibilityChangeDeliveryIntervals,
        public Optional|bool $possibilityTermExtension,
        public bool $possibilityTrusteeRecipient,
        public string $trusteeRecipientPhone,
        public string $redeliveryPaymentCardRef,
        public string $redeliveryPaymentCardDescription,
        public string $freeShipping,
        public string $internetDocumentDescription,
        public string $lastCreatedOnTheBasisDocumentType,
        public string $loyaltyCardRecipient,
        public string $loyaltyCardSender,
        public string $phoneRecipient,
        public string $phoneSender,
        public string $recipientFullNameEW,
        public string $redeliveryServiceCost,
        public string $senderFullNameEW,
    ) {
    }
}
