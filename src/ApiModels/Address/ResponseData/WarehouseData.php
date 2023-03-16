<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Address\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class WarehouseData extends Data
{
    public function __construct(
        public int $siteKey,
        public string $description,
        public string $shortAddress,
        public string $phone,
        public string $typeOfWarehouse,
        public string $ref,
        public int $number,
        public string $cityRef,
        public string $cityDescription,
        public string $settlementRef,
        public string $settlementDescription,
        public string $settlementAreaDescription,
        public string $settlementRegionsDescription,
        public string $settlementTypeDescription,
        public string $longitude,
        public string $latitude,
        public bool $postFinance,
        public bool $bicycleParking,
        public bool $paymentAccess,
        public bool $POSTerminal,
        public bool $internationalShipping,
        public bool $selfServiceWorkplacesCount,
        public int $totalMaxWeightAllowed,
        public int $placeMaxWeightAllowed,
        public LimitationsOnDimensions $sendingLimitationsOnDimensions,
        public LimitationsOnDimensions $receivingLimitationsOnDimensions,
        public Weekdays $reception,
        public Weekdays $delivery,
        public Weekdays $schedule,
        public string $districtCode,
        public string $warehouseStatus,
        public string $warehouseStatusDate,
        public string $categoryOfWarehouse,
        public string $direct,
        public string $regionCity,
        public bool $warehouseForAgent,
        public bool $generatorEnabled,
        public int $maxDeclaredCost,
        public bool $workInMobileAwis,
        public bool $denyToSelect,
        public bool $canGetMoneyTransfer,
        public ?bool $onlyReceivingParcel,
        public string $postMachineType,
        public string $postalCodeUA,
        public string $warehouseIndex,
    ) {
    }
}
