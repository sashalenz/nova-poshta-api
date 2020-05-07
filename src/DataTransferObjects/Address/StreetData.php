<?php

namespace Sashalenz\NovaPoshtaApi\DataTransferObjects\Address;

use Sashalenz\NovaPoshtaApi\DataTransferObjects\DataTransferObject;

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
