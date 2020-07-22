<?php

namespace Sashalenz\NovaPoshta\DataTransferObjects\Address;

use Sashalenz\NovaPoshta\DataTransferObjects\DataTransferObject;

class SettlementStreetData extends DataTransferObject
{
    public string $present;
    public string $settlementStreetRef;

    /**
     * @param $array
     * @return SettlementStreetData
     */
    public static function fromArray($array) : SettlementStreetData
    {
        return new self([
            'present' => $array['Present'],
            'settlementStreetRef' => $array['SettlementStreetRef']
        ]);
    }
}
