<?php

namespace Sashalenz\NovaPoshtaApi\DataTransferObjects\Counterparty;

use Sashalenz\NovaPoshtaApi\DataTransferObjects\ContactPerson\ContactPersonData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\DataTransferObject;

class CounterpartyData extends DataTransferObject
{
    public string $ref;
    public string $description;
    public string $counterpartyType;
    public string $firstName;
    public string $lastName;
    public string $middleName;
    public ?ContactPersonData $contactPerson = null;

    public static function fromArray($array)
    {
        return new self([
            'ref' => $array['Ref'],
            'description' => $array['Description'],
            'counterpartyType' => $array['CounterpartyType'],
            'firstName' => $array['FirstName'],
            'lastName' => $array['LastName'],
            'middleName' => $array['MiddleName'],
            'contactPerson' => isset($array['ContactPerson']) && count($array['ContactPerson']['data'])
                ? ContactPersonData::fromArray($array['ContactPerson']['data'][0])
                : null
        ]);
    }
}
