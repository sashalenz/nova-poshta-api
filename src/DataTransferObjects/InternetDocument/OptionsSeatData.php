<?php

namespace Sashalenz\NovaPoshta\DataTransferObjects\InternetDocument;

use Sashalenz\NovaPoshta\DataTransferObjects\DataTransferObject;

class OptionsSeatData extends DataTransferObject
{
    public float $volumetricVolume;
    public int $volumetricWidth;
    public int $volumetricLength;
    public int $volumetricHeight;
    public float $weight;
    public float $volumetricWeight;
    public int $cost;
    public ?string $description = null;
    public ?string $packRef = null;

    public static function fromArray($array)
    {
        return new self([
            'volumetricVolume' => (float) $array['volumetricVolume'],
            'volumetricWidth' => (int) $array['volumetricWidth'],
            'volumetricLength' => (int) $array['volumetricLength'],
            'volumetricHeight' => (int) $array['volumetricHeight'],
            'weight' => (float) $array['weight'],
            'volumetricWeight' => (float) $array['volumetricWeight'],
            'cost' => (int) $array['cost'],
            'description' => $array['description'],
            'packRef' => $array['packRef'],
        ]);
    }
}
