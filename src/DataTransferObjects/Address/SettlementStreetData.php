<?php

namespace Sashalenz\NovaPoshtaApi\DataTransferObjects\Address;

use Sashalenz\NovaPoshtaApi\DataTransferObjects\DataTransferObject;

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
