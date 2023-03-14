<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\ScanSheet\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class RemoveScanSheetData extends Data
{
    public function __construct(
        public string $ref,
        public string $number,
        public string $error,
    ) {
    }
}
