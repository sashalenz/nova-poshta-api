<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\ScanSheet\RequestData;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\ArrayType;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapOutputName(StudlyCaseMapper::class)]
final class RemoveDocumentsRequest extends Data
{
    public function __construct(
        #[ArrayType]
        public Optional|array $documentRefs,
        #[Uuid, Nullable]
        public Optional|string $ref,
    ) {
    }
}
