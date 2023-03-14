<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Address;

use Sashalenz\NovaPoshtaApi\ApiModels\Address\RequestData\AddressRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\Address\RequestData\GetCitiesRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\Address\RequestData\GetSettlementsRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\Address\RequestData\GetStreetRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\Address\RequestData\GetWarehousesRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\Address\RequestData\SearchSettlementsRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\Address\RequestData\SearchSettlementStreetsRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\Address\ResponseData\AddressData;
use Sashalenz\NovaPoshtaApi\ApiModels\Address\ResponseData\AreaData;
use Sashalenz\NovaPoshtaApi\ApiModels\Address\ResponseData\CityData;
use Sashalenz\NovaPoshtaApi\ApiModels\Address\ResponseData\SearchSettlementData;
use Sashalenz\NovaPoshtaApi\ApiModels\Address\ResponseData\SettlementData;
use Sashalenz\NovaPoshtaApi\ApiModels\Address\ResponseData\SettlementStreetData;
use Sashalenz\NovaPoshtaApi\ApiModels\Address\ResponseData\StreetData;
use Sashalenz\NovaPoshtaApi\ApiModels\Address\ResponseData\WarehouseData;
use Sashalenz\NovaPoshtaApi\ApiModels\Address\ResponseData\WarehouseTypeData;
use Sashalenz\NovaPoshtaApi\ApiModels\BaseModel;
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;
use Sashalenz\NovaPoshtaApi\RequestData\RefRequest;
use Sashalenz\NovaPoshtaApi\ResponseData\RefData;
use Spatie\LaravelData\DataCollection;

final class Address extends BaseModel
{
    /**
     * @throws NovaPoshtaException
     */
    public function searchSettlements(SearchSettlementsRequest $request): SearchSettlementData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(SearchSettlementData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function searchSettlementStreets(SearchSettlementStreetsRequest $request): SettlementStreetData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(SettlementStreetData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getSettlements(GetSettlementsRequest $request): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toCollection(SettlementData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getCities(GetCitiesRequest $request): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toCollection(CityData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getAreas(): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->toCollection(AreaData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getWarehouseTypes(): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->toCollection(WarehouseTypeData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getWarehouses(GetWarehousesRequest $request): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toCollection(WarehouseData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getStreet(GetStreetRequest $request): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toCollection(StreetData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function save(AddressRequest $request): AddressData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(AddressData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function update(AddressRequest $request): AddressData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(AddressData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function delete(RefRequest $request): RefData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(RefData::class);
    }
}
