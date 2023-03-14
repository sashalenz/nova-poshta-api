<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\TrackingDocument\RequestData;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Size;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
final class DocumentData extends Data
{
    public function __construct(
        #[Size(14), StringType]
        public string $documentNumber,
        public string $phone,
    ) {
    }
}
