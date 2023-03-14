<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\RequestData;

use Carbon\Carbon;
use Sashalenz\NovaPoshtaApi\Transformers\CarbonInterfaceTransformer;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Size;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapOutputName(StudlyCaseMapper::class)]
class GetOrdersListRequest extends Data
{
    public function __construct(
        #[Size(14), StringType]
        public Optional|string $number,
        #[Uuid]
        public Optional|string $ref,
        #[WithTransformer(CarbonInterfaceTransformer::class, format: 'd/m/Y H:i')]
        public Optional|Carbon $beginDate,
        #[WithTransformer(CarbonInterfaceTransformer::class, format: 'd/m/Y H:i')]
        public Optional|Carbon $endDate,
        public ?string $page = '1',
        public ?string $limit = '50',
    ) {
    }
}
