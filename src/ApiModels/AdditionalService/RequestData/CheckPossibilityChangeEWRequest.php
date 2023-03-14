<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\RequestData;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Size;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
class CheckPossibilityChangeEWRequest extends Data
{
    public function __construct(
        #[Size(14), StringType]
        public string $intDocNumber
    ) {
    }
}
