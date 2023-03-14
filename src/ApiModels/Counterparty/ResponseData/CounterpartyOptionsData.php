<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Counterparty\ResponseData;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class CounterpartyOptionsData extends Data
{
    public function __construct(
        public bool $fillingWarranty,
        public bool $addressDocumentDelivery,
        public bool $canPayTheThirdPerson,
        public bool $canAfterpaymentOnGoodsCost,
        public bool $canNonCashPayment,
        public bool $canCreditDocuments,
        public bool $canEWTransporter,
        public bool $canSignedDocuments,
        public bool $hideDeliveryCost,
        public bool $blockInternationalSenderLKK,
        public bool $internationalDelivery,
        public bool $pickupService,
        public bool $canSameDayDelivery,
        public bool $canSameDayDeliveryStandart,
        public bool $canForwardingService,
        public bool $showDeliveryByHand,
        public bool $deliveryByHand,
        public bool $partialReturn,
        public bool $loyaltyProgram,
        public bool $canSentFromPostomat,
        public bool $descentFromFloor,
        public bool $backDeliveryValuablePapers,
        public bool $backwardDeliverySubtypesDocuments,
        public string $afterpaymentType,
        public bool $creditDocuments,
        public bool $signedDocuments,
        public bool $services,
        public bool $internationalDeliveryServiceType,
        public PrintMarkingAllowedTypes $printMarkingAllowedTypes,
        public bool $inventoryOrder,
        public bool $debtor,
        #[DataCollectionOf(DebtorParam::class)]
        public DataCollection $debtorParams,
        public bool $calculationByFactualWeight,
        public bool $transferPricingConditions,
        public bool $businessClient,
        public bool $haveMoneyWallets,
        public bool $customerReturn,
        public bool $dayCustomerReturn,
        public bool $mainCounterparty,
        public bool $securePayment,
    ) {
    }
}
