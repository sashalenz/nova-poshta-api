<?php

namespace Sashalenz\NovaPoshtaApi\DataTransferObjects\InternetDocument;

use Sashalenz\NovaPoshtaApi\DataTransferObjects\DataTransferObject;

class DocumentPriceData extends DataTransferObject
{
    public int $assessedCost;
    public int $cost;
    public ?int $costRedelivery = null;
    public ?int $costPack = null;

    public static function fromArray($array)
    {
        return new self([
            'assessedCost' => $array['AssessedCost'],
            'cost' => $array['Cost'],
            'costRedelivery' => $array['CostRedelivery'] ?? null,
            'costPack' => $array['CostPack'] ?? null,
        ]);
    }
}
