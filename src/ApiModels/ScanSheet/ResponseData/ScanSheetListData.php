<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\ScanSheet\ResponseData;

use Carbon\Carbon;
use Sashalenz\NovaPoshtaApi\Casts\CarbonInterfaceCast;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapInputName(StudlyCaseMapper::class)]
final class ScanSheetListData extends Data
{
    public function __construct(
        public string $ref,
        public string $number,
        #[WithCast(CarbonInterfaceCast::class, format: 'Y-m-d H:i:s')]
        public ?Carbon $dateTime,
        public Optional|bool $printed,
        public string $description,
        public Optional|string $marketplacePartnerDescription,
        public int $count,
    ) {
    }
}
