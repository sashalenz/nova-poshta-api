<?php

namespace Sashalenz\NovaPoshtaApi\DataTransferObjects\InternetDocument;

use Sashalenz\NovaPoshtaApi\DataTransferObjects\DataTransferObject;
use Carbon\Carbon;

class DocumentData extends DataTransferObject
{
    public string $ref;
    public int $costOnSire;
    public Carbon $estimatedDeliveryDate;
    public int $intDocNumber;
    public string $typeDocument;


    public static function fromArray($array)
    {
        return new self([
            'ref' => $array['Ref'],
            'costOnSite' => (int) $array['CostOnSite'],
            'estimatedDeliveryDate' => Carbon::createFromFormat('d.m.Y', $array['EstimatedDeliveryDate']),
            'intDocNumber' => $array['IntDocNumber'],
            'typeDocument' => $array['TypeDocument']
        ]);
    }
}
