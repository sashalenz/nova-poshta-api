<?php

namespace A20\Services\NovaPoshta\DataTransferObjects\Counterparty;

use A20\Services\NovaPoshta\DataTransferObjects\DataTransferObject;

class AddressData extends DataTransferObject
{
    public string $ref;
    public string $description;
    public string $cityRef;
    public string $cityDescription;
    public string $streetRef;
    public string $streetDescription;
    public string $buildingRef;
    public string $buildingDescription;

    public static function fromArray($array)
    {
        return new self([
            'ref' => $array['Ref'],
            'description' => $array['Description'],
            'cityRef' => $array['CityRef'],
            'cityDescription' => $array['CityDescription'],
            'streetRef' => $array['StreetRef'],
            'streetDescription' => $array['StreetDescription'],
            'buildingRef' => $array['BuildingRef'],
            'buildingDescription' => $array['BuildingDescription'],
        ]);
    }
}
