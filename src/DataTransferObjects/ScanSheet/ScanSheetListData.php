<?php

namespace Sashalenz\NovaPoshtaApi\DataTransferObjects\ScanSheet;

use Sashalenz\NovaPoshtaApi\DataTransferObjects\DataTransferObject;
use Carbon\Carbon;

class ScanSheetListData extends DataTransferObject
{
    public string $ref;
    public string $number;
    public Carbon $dateTime;
    public bool $printed;

    public static function fromArray($array)
    {
        return new self([
            'ref' => $array['Ref'],
            'number' => $array['Number'],
            'dateTime' => Carbon::createFromFormat('Y-m-d H:i:s', $array['DateTime']),
            'printed' => (bool) $array['Printed']
        ]);
    }
}
