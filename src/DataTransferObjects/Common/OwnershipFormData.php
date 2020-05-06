<?php

namespace A20\Services\NovaPoshta\DataTransferObjects\Common;

use A20\Services\NovaPoshta\DataTransferObjects\DataTransferObject;

class OwnershipFormData extends DataTransferObject
{
    public string $ref;
    public string $description;
    public string $fullName;

    public static function fromArray($array)
    {
        return new self([
            'ref' => $array['Ref'],
            'description' => $array['Description'],
            'fullName' => $array['FullName']
        ]);
    }
}
