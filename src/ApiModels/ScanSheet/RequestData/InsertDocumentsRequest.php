<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\ScanSheet\RequestData;

use Carbon\Carbon;
use Sashalenz\NovaPoshtaApi\Transformers\CarbonInterfaceTransformer;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\ArrayType;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapOutputName(StudlyCaseMapper::class)]
final class InsertDocumentsRequest extends Data
{
    public function __construct(
        #[ArrayType]
        public array $documentRefs,
        #[Uuid, Nullable]
        public Optional|string $ref,
        #[WithTransformer(CarbonInterfaceTransformer::class, format: 'd.m.Y')]
        public Carbon $date,
    ) {
    }
}
