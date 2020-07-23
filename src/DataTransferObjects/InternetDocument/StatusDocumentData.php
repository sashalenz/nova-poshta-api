<?php

namespace Sashalenz\NovaPoshtaApi\DataTransferObjects\InternetDocument;

use Sashalenz\NovaPoshtaApi\DataTransferObjects\DataTransferObject;
use Carbon\Carbon;

class StatusDocumentData extends DataTransferObject
{
    public string $number;
    public bool $redelivery;
    public ?int $redeliverySum = null;
    public ?Carbon $dateCreated = null;
    public ?float $documentWeight = null;
    public ?int $documentCost = null;
    public ?string $payerType = null;
    public ?string $cargoType = null;
    public ?Carbon $scheduledDeliveryDate = null;
    public ?Carbon $actualDeliveryDate = null;
    public ?int $seatsAmount = null;
    public string $status;
    public int $statusCode;
    public string $refEW;

    public static function fromArray($array)
    {
        return new self([
            'number' => $array['Number'],
            'redelivery' => array_key_exists('Redelivery', $array) ? (bool) $array['Redelivery'] : false,
            'redeliverySum' =>  array_key_exists('RedeliverySum', $array) ? (int) $array['RedeliverySum'] : null,
            'dateCreated' => array_key_exists('DateCreated', $array) && $array['DateCreated'] !== '' ? Carbon::createFromFormat('d-m-Y H:i:s', $array['DateCreated']) : null,
            'documentWeight' => array_key_exists('DocumentWeight', $array) ? (float) $array['DocumentWeight'] : null,
            'documentCost' => array_key_exists('DocumentCost', $array) ? (int) $array['DocumentCost'] : null,
            'payerType' => $array['PayerType'] ?? '',
            'cargoType' => $array['CargoType'] ?? '',
            'scheduledDeliveryDate' => array_key_exists('ScheduledDeliveryDate', $array) && $array['ScheduledDeliveryDate'] !== '' ? Carbon::createFromFormat('d-m-Y H:i:s', $array['ScheduledDeliveryDate']) : null,
            'actualDeliveryDate' => array_key_exists('ActualDeliveryDate', $array) && $array['ActualDeliveryDate'] !== '' ? Carbon::createFromFormat('Y-m-d H:i:s', $array['ActualDeliveryDate']) : null,
            'seatsAmount' => array_key_exists('SeatsAmount', $array) ? (int) $array['SeatsAmount'] : null,
            'status' => $array['Status'],
            'statusCode' => (int) $array['StatusCode'],
            'refEW' => $array['RefEW']
        ]);
    }
}
