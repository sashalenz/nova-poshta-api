<?php

namespace Sashalenz\NovaPoshtaApi\DataTransferObjects\AdditionalService;

use Sashalenz\NovaPoshtaApi\DataTransferObjects\DataTransferObject;

class ReturnReasonData extends DataTransferObject
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
