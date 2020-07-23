<?php

namespace Sashalenz\NovaPoshtaApi\DataTransferObjects\Common;

use Sashalenz\NovaPoshtaApi\DataTransferObjects\DataTransferObject;

class TimeIntervalData extends DataTransferObject
{
    public int $number;
    public string $start;
    public string $end;

    public static function fromArray($array)
    {
        return new self([
            'number' => $array['Number'],
            'start' => $array['Start'],
            'end' => $array['End']
        ]);
    }
}
