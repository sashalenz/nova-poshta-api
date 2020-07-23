<?php

namespace Sashalenz\NovaPoshtaApi\DataTransferObjects\Common;

use Sashalenz\NovaPoshtaApi\DataTransferObjects\DataTransferObject;

class TiresWheelsListData extends DataTransferObject
{
    public string $ref;
    public string $description;
    public int $weight;
    public string $descriptionType;

    public static function fromArray($array)
    {
        return new self([
            'ref' => $array['Ref'],
            'description' => $array['Description'],
            'weight' => (int) $array['Weight'],
            'descriptionType' => $array['DescriptionType']
        ]);
    }
}
