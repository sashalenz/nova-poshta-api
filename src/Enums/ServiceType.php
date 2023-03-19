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
}
