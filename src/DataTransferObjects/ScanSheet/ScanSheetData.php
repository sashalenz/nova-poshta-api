<?php

namespace Sashalenz\NovaPoshtaApi\DataTransferObjects\ScanSheet;

use Sashalenz\NovaPoshtaApi\DataTransferObjects\DataTransferObject;
use Carbon\Carbon;

class ScanSheetData extends DataTransferObject
{
    public string $ref;
    public string $number;
    public ?Carbon $date = null;
    public ?Carbon $dateTime = null;
    public ?int $count = null;
    public ?string $citySenderRef = null;
    public ?string $citySender = null;
    public ?string $senderAddressRef = null;
    public ?string $senderAddress = null;
    public ?string $senderRef = null;
    public ?string $sender = null;

    public static function fromArray($array)
    {
        return new self([
            'ref' => $array['Ref'],
            'number' => $array['Number'],
            'dateTime' => isset($array['DateTime']) ? Carbon::createFromFormat('Y-m-d H:i:s', $array['DateTime']) : null,
            'date' => isset($array['Date']) ? Carbon::createFromFormat('Y-m-d H:i:s', $array['Date']) : null,
            'count' => isset($array['Count']) ? (int) $array['Count'] : null,
            'citySenderRef' => $array['CitySenderRef'] ?? null,
            'citySender' => $array['CitySender'] ?? null,
            'senderAddressRef' => $array['SenderAddressRef'] ?? null,
            'senderAddress' => $array['SenderAddress'] ?? null,
            'senderRef' => $array['SenderRef'] ?? null,
            'sender' => $array['Sender'] ?? null
        ]);
    }
}
