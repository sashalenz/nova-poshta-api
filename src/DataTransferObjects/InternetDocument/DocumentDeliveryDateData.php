<?php

namespace A20\Services\NovaPoshta\DataTransferObjects\InternetDocument;

use A20\Services\NovaPoshta\DataTransferObjects\DataTransferObject;
use Carbon\Carbon;

class DocumentDeliveryDateData extends DataTransferObject
{
    public Carbon $deliveryDate;

    public static function fromArray($array)
    {
        return new self([
            'deliveryDate' => Carbon::createFromFormat('Y-m-d H:i:s.000000', $array['DeliveryDate']['date'], $array['DeliveryDate']['timezone'])
        ]);
    }
}
