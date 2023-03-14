<?php

namespace Sashalenz\NovaPoshtaApi\Enums;

enum ServiceType: string
{
    case DOORS_DOORS = 'DoorsDoors';
    case DOORS_POSTOMAT = 'DoorsPostomat';
    case DOORS_WAREHOUSE = 'DoorsWarehouse';
    case WAREHOUSE_DOORS = 'WarehouseDoors';
    case WAREHOUSE_POSTOMAT = 'WarehousePostomat';
    case WAREHOUSE_WAREHOUSE = 'WarehouseWarehouse';

    public static function make(string $sender, string $recipient): self
    {
        $string = implode('_', [$sender, $recipient]);

        return self::$string;
    }
}
