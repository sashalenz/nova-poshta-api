<?php

namespace Sashalenz\NovaPoshtaApi\DataTransferObjects\AdditionalService;

use Sashalenz\NovaPoshtaApi\DataTransferObjects\DataTransferObject;

class AdditionalServiceData extends DataTransferObject
{
    public string $ref;
    public string $number;

    public static function fromArray($array)
    {
        return new self([
            'ref' => $array['Ref'],
            'number' => $array['Number']
        ]);
    }
}
