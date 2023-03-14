<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\ScanSheet\RequestData;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapOutputName(StudlyCaseMapper::class)]
final class GetScanSheetRequest extends Data
{
    public function __construct(
        #[Uuid]
        public string $ref,
        #[Uuid]
        public Optional|string $counterpartyRef,
    ) {
    }
}
