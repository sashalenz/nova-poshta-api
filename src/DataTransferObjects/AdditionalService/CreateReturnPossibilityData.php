<?php

namespace Sashalenz\NovaPoshtaApi\DataTransferObjects\AdditionalService;

use Sashalenz\NovaPoshtaApi\DataTransferObjects\DataTransferObject;

class CreateReturnPossibilityData extends DataTransferObject
{
    public string $ref;
    public int $phone;
    public string $address;
    public string $contactPerson;
    public string $counterparty;
    public string $city;
    public bool $nonCash;

    public static function fromArray($array)
    {
        return new self([
            'ref' => $array['Ref'],
            'phone' => (int) $array['Phone'],
            'address' => $array['Address'],
            'contactPerson' => $array['ContactPerson'],
            'counterparty' => $array['Counterparty'],
            'city' => $array['City'],
            'nonCash' => (bool) $array['NonCash']
        ]);
    }
}
