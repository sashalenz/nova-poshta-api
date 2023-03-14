<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\TrackingDocument\RequestData;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
final class GetStatusDocumentsRequest extends Data
{
    public function __construct(
        #[DataCollectionOf(DocumentData::class)]
        public DataCollection $documents
    ) {
    }
}
