<?php

namespace Sashalenz\NovaPoshtaApi\DataTransferObjects\Common;

use Sashalenz\NovaPoshtaApi\DataTransferObjects\DataTransferObject;

class PackListData extends DataTransferObject
{
    public string $ref;
    public string $description;
    public string $length;
    public string $width;
    public string $height;
    public string $typeOfPacking;

    public static function fromArray($array)
    {
        return new self([
            'ref' => $array['Ref'],
            'description' => $array['Description'],
            'length' => $array['Length'],
            'width' => $array['Width'],
            'height' => $array['Height'],
            'typeOfPacking' => $array['TypeOfPacking']
        ]);
    }
}
