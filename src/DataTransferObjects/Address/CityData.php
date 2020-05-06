<?php

namespace A20\Services\NovaPoshta\DataTransferObjects\Address;

use A20\Services\NovaPoshta\DataTransferObjects\DataTransferObject;

class CityData extends DataTransferObject
{
    public string $ref;
    public string $area;
    public string $description;

    public static function fromArray($array)
    {
        return new self([
            'ref' => $array['Ref'],
            'area' => $array['Area'],
            'description' => $array['SettlementTypeDescription'].' '.$array['Description']
        ]);
    }
}
