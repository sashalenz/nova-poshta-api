<?php

namespace Sashalenz\NovaPoshtaApi\DataTransferObjects\Address;

use Sashalenz\NovaPoshtaApi\DataTransferObjects\DataTransferObject;

class AddressData extends DataTransferObject
{
    public string $ref;
    public string $description;

    public static function fromArray($array)
    {
        return new self([
            'ref' => $array['Ref'],
            'description' => $array['Description']
        ]);
    }
}
