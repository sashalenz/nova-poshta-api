<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Common\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapInputName(StudlyCaseMapper::class)]
final class MessageCodeTextData extends Data
{
    public function __construct(
        public string $messageCode,
        public string $messageText,
        #[MapInputName('MessageDescriptionUA')]
        public Optional|null|string $messageDescription,
    ) {
    }
}
