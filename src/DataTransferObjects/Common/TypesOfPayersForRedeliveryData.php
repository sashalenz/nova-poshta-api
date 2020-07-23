<?php

namespace Sashalenz\NovaPoshtaApi\DataTransferObjects\Common;

use Sashalenz\NovaPoshtaApi\DataTransferObjects\DataTransferObject;

class TypesOfPayersForRedeliveryData extends DataTransferObject
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
