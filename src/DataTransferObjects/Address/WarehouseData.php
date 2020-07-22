<?php

namespace Sashalenz\NovaPoshta\DataTransferObjects\Address;

use Sashalenz\NovaPoshta\DataTransferObjects\DataTransferObject;

class WarehouseData extends DataTransferObject
{
    //'SiteKey' => '16467',
    //'Description' => 'Відділення №25 (до 30 кг на одне місце): просп. Богоявленський (ран. Жовтневий), 310',
    //'DescriptionRu' => 'Отделение №25 (до 30 кг на одно место): просп. Богоявленский (ран. Октябрьский), 310',
    //'ShortAddress' => 'Миколаїв, Богоявленський, 310',
    //'ShortAddressRu' => 'Николаев, Богоявленский, 310',
    //'Phone' => '380800500609',
    //'TypeOfWarehouse' => '841339c7-591a-42e2-8233-7a0a00f0ed6f',
    //'Ref' => 'b9d61c63-6101-11e9-898c-005056b24375',
    //'Number' => '25',
    //'CityRef' => 'db5c888c-391c-11dd-90d9-001a92567626',
    //'CityDescription' => 'Миколаїв',
    //'CityDescriptionRu' => 'Николаев',
    //'SettlementRef' => 'e71b108c-4b33-11e4-ab6d-005056801329',
    //'SettlementDescription' => 'Миколаїв',
    //'SettlementAreaDescription' => 'Миколаївська область',
    //'SettlementRegionsDescription' => '',
    //'SettlementTypeDescription' => 'місто',
    //'Longitude' => '32.018026000000000',
    //'Latitude' => '46.870126000000000',
    //'PostFinance' => '1',
    //'BicycleParking' => '0',
    //'PaymentAccess' => '0',
    //'POSTerminal' => '1',
    //'InternationalShipping' => '0',
    //'SelfServiceWorkplacesCount' => '1',
    //'TotalMaxWeightAllowed' => 0,
    //'PlaceMaxWeightAllowed' => '30',
    //'Reception' =>
    //array (
    //'Monday' => '09:30-17:00',
    //'Tuesday' => '09:30-20:00',
    //'Wednesday' => '09:30-20:00',
    //'Thursday' => '09:30-20:00',
    //'Friday' => '09:30-20:00',
    //'Saturday' => '09:30-17:00',
    //'Sunday' => '11:30-17:00',
    //),
    //'Delivery' =>
    //array (
    //'Monday' => '09:00-18:00',
    //'Tuesday' => '09:00-18:00',
    //'Wednesday' => '09:00-18:00',
    //'Thursday' => '09:00-18:00',
    //'Friday' => '09:00-18:00',
    //'Saturday' => '09:00-17:00',
    //'Sunday' => '11:00-15:30',
    //),
    //'Schedule' =>
    //array (
    //'Monday' => '09:00-17:00',
    //'Tuesday' => '09:00-20:00',
    //'Wednesday' => '09:00-20:00',
    //'Thursday' => '09:00-20:00',
    //'Friday' => '09:00-20:00',
    //'Saturday' => '09:00-17:00',
    //'Sunday' => '-',
    //),
    //'DistrictCode' => 'СК25',
    //'WarehouseStatus' => 'Working',
    //'WarehouseStatusDate' => '2019-07-17 00:00:00',
    //'CategoryOfWarehouse' => 'Branch',
    //'Direct' => '',

    public string $description;
    public string $ref;

    public static function fromArray($array)
    {
        return new self([
            'ref' => $array['Ref'],
            'description' => $array['Description']
        ]);
    }
}
