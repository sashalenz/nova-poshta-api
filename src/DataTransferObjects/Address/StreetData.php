<?php

namespace A20\Services\NovaPoshta\DataTransferObjects\Address;

use A20\Services\NovaPoshta\DataTransferObjects\DataTransferObject;

class StreetData extends DataTransferObject
{
    public string $ref;
    public string $description;

    public static function fromArray($array)
    {
        return new self([
            'ref' => $array['Ref'],
            'description' => $array['StreetsType'].' '.$array['Description']
        ]);
    }
}
