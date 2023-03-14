<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\RequestData;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
class GetReturnReasonsSubtypesRequest extends Data
{
    public function __construct(
        #[Uuid]
        public string $reasonRef
    ) {
    }
}
