<?php

namespace A20\Services\NovaPoshta\DataTransferObjects\InternetDocument;

use A20\Services\NovaPoshta\DataTransferObjects\DataTransferObject;
use Carbon\Carbon;

class StatusDocumentData extends DataTransferObject
{
    public string $number;
    public bool $redelivery;
    public int $redeliverySum;
    public Carbon $dateCreated;
    public float $documentWeight;
    public int $documentCost;
    public string $payerType;
    public string $cargoType;
    public Carbon $scheduledDeliveryDate;
    public int $seatsAmount;
    public string $status;
    public int $statusCode;
    public string $refEW;

    public static function fromArray($array)
    {
        return new self([
            'number' => $array['Number'],
            'redelivery' => $array['Redelivery'],
            'redeliverySum' => (int) $array['RedeliverySum'],
            'dateCreated' => Carbon::createFromFormat('d-m-Y H:i:s', $array['DateCreated']),
            'documentWeight' => (float) $array['DocumentWeight'],
            'documentCost' => (int) $array['DocumentCost'],
            'payerType' => $array['PayerType'],
            'cargoType' => $array['CargoType'],
            'scheduledDeliveryDate' => Carbon::createFromFormat('d-m-Y H:i:s', $array['ScheduledDeliveryDate']),
            'seatsAmount' => $array['SeatsAmount'],
            'actualDeliveryDate' => Carbon::createFromFormat('d-m-Y H:i:s', $array['ActualDeliveryDate']),
            'status' => $array['Status'],
            'statusCode' => (int) $array['StatusCode'],
            'refEW' => $array['RefEW']
        ]);
    }
}
