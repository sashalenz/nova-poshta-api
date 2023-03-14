<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\ScanSheet\RequestData;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\ArrayType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
final class RemoveScanSheetRequest extends Data
{
    public function __construct(
        #[ArrayType]
        public array $scanSheetRefs,
    ) {
    }
}
