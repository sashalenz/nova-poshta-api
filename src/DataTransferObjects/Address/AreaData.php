<?php

namespace Sashalenz\NovaPoshtaApi\DataTransferObjects\Address;

use Sashalenz\NovaPoshtaApi\DataTransferObjects\DataTransferObject;

class AreaData extends DataTransferObject
{
    public string $ref;
    public string $description;
    public string $areasCenter;

    public static function fromArray($array)
    {
        return new self([
            'ref' => $array['Ref'],
            'description' => $array['Description'],
            'areasCenter' => $array['AreasCenter']
        ]);
    }
}
