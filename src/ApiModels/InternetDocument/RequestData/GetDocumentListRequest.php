<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\RequestData;

use Carbon\Carbon;
use Sashalenz\NovaPoshtaApi\Transformers\CarbonInterfaceTransformer;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapOutputName(StudlyCaseMapper::class)]
class GetDocumentListRequest extends Data
{
    public function __construct(
        #[WithTransformer(CarbonInterfaceTransformer::class, 'd.m.Y')]
        public Optional|null|Carbon $dateTimeFrom,
        #[WithTransformer(CarbonInterfaceTransformer::class, 'd.m.Y')]
        public Optional|null|Carbon $dateTimeTo,
        #[WithTransformer(CarbonInterfaceTransformer::class, 'd.m.Y')]
        public Optional|null|Carbon $dateTime,
        public Optional|bool $getFullList,
        public ?string $page = '1'
    ) {
    }
}
