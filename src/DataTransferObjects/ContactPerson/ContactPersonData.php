<?php

namespace Sashalenz\NovaPoshtaApi\DataTransferObjects\ContactPerson;

use Sashalenz\NovaPoshtaApi\DataTransferObjects\DataTransferObject;

class ContactPersonData extends DataTransferObject
{
    public string $ref;
    public string $description;
    public ?string $phone = null;
    public ?string $email = null;
    public string $lastName;
    public string $firstName;
    public ?string $middleName = null;

    public static function fromArray($array)
    {
        return new self([
            'ref' => $array['Ref'],
            'description' => $array['Description'],
            'phone' => $array['Phones'] ?? null,
            'email' => $array['Email'] ?? null,
            'lastName' => $array['LastName'],
            'firstName' => $array['FirstName'],
            'middleName' => $array['MiddleName'],
        ]);
    }
}
