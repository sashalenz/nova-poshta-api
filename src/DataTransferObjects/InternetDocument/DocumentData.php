<?php

namespace Sashalenz\NovaPoshtaApi\DataTransferObjects\InternetDocument;

use Sashalenz\NovaPoshtaApi\DataTransferObjects\DataTransferObject;
use Carbon\Carbon;

class DocumentData extends DataTransferObject
{
    public string $ref;
    public ?int $costOnSite = null;
    public ?string $intDocNumber = null;
    public ?string $typeDocument = null;
    public ?Carbon $estimatedDeliveryDate = null;

    public static function fromArray($array)
    {
        return new self([
            'ref' => $array['Ref'],
            'costOnSite' => $array['CostOnSite'] ?? null,
            'estimatedDeliveryDate' => isset($array['EstimatedDeliveryDate'])
                ? Carbon::createFromFormat('d.m.Y', $array['EstimatedDeliveryDate'])
                : null,
            'intDocNumber' => $array['IntDocNumber'] ?? null,
            'typeDocument' => $array['TypeDocument'] ?? null
        ]);
    }
}
