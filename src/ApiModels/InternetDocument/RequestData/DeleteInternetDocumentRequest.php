<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\RequestData;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
class DeleteInternetDocumentRequest extends Data
{
    public function __construct(
        public string $documentRefs,
    ) {
    }
}
