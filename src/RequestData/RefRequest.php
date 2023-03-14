<?php

namespace Sashalenz\NovaPoshtaApi\RequestData;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\Uuid;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

final class RefRequest extends Data
{
    public function __construct(
        #[Uuid, Required, MapOutputName(StudlyCaseMapper::class)]
        public string $ref
    ) {
    }
}
