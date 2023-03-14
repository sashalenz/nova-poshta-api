<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Address\ResponseData;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapInputName(StudlyCaseMapper::class)]
final class SearchSettlementData extends Data
{
    public function __construct(
        public readonly int $totalCount,
        #[DataCollectionOf(SearchSettlementAddressData::class)]
        public readonly Optional|DataCollection $addresses,
    ) {
    }
}
