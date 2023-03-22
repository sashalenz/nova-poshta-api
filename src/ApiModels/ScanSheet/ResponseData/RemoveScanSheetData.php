<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\ScanSheet\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapInputName(StudlyCaseMapper::class)]
final class RemoveScanSheetData extends Data
{
    public function __construct(
        public Optional|string $ref,
        public Optional|string $number,
        public Optional|string $error,
    ) {
    }
}
