<?php

namespace Sashalenz\NovaPoshtaApi\DataTransferObjects\Address;

use Sashalenz\NovaPoshtaApi\DataTransferObjects\DataTransferObject;

class SettlementData extends DataTransferObject
{
    public string $present;
    public string $ref;

    public static function fromArray($array)
    {
        return new self([
            'ref' => $array['Ref'],
            'present' => $array['Present']
        ]);
    }
}
