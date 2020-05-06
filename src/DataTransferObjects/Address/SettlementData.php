<?php

namespace A20\Services\NovaPoshta\DataTransferObjects\Address;

use A20\Services\NovaPoshta\DataTransferObjects\DataTransferObject;

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
