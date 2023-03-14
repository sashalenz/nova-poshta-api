<?php

namespace Sashalenz\NovaPoshtaApi\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

final class RefData extends Data
{
    public function __construct(
        #[MapInputName(StudlyCaseMapper::class)]
        public string $ref
    ) {
    }
}
