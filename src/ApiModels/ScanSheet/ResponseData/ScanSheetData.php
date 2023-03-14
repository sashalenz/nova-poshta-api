<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\ScanSheet\ResponseData;

use Carbon\Carbon;
use Sashalenz\NovaPoshtaApi\Casts\CarbonInterfaceCast;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class ScanSheetData extends Data
{
    public function __construct(
        public string $ref,
        public string $number,
        #[WithCast(CarbonInterfaceCast::class, format: 'Y-m-d H:i:s')]
        public ?Carbon $dateTime,
        public bool $printed,
        public string $description,
        public int $count,
        public string $citySenderRef,
        public string $citySender,
        public string $senderAddressRef,
        public string $senderAddress,
        public string $senderRef,
        public string $sender,
        public float $totalCost,
        public float $totalRedeliverySum,
        public float $totalAfterpaymentOnGoodsCost,
        public float $totalWeight,
        public float $totalCostOnSite,
        public string $totalCheckWeight,
        public string $totalCheckCost,
        public string $totalCostOnSiteSender,
        public string $totalCheckCostSender,
    ) {
    }
}
