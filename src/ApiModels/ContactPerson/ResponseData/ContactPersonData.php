<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\ContactPerson\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;
use Spatie\LaravelData\Optional;

#[MapInputName(StudlyCaseMapper::class)]
final class ContactPersonData extends Data
{
    public function __construct(
        public string $ref,
        public string $description,
        public string $lastName,
        public string $firstName,
        public string $middleName,
        public string $phones,
        public Optional|string $additionalPhone,
        public Optional|null|string $email,
    ) {
    }
}
