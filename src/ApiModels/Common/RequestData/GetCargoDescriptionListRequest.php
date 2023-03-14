<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Common\RequestData;

use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapOutputName(StudlyCaseMapper::class)]
final class GetCargoDescriptionListRequest extends Data
{
    public function __construct(
        public string $findByString,
        public ?string $page = '1'
    ) {
    }
}
