<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Counterparty;

use Sashalenz\NovaPoshtaApi\ApiModels\BaseModel;
use Sashalenz\NovaPoshtaApi\ApiModels\Counterparty\RequestData\GetCatalogCounterpartyRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\Counterparty\RequestData\GetCounterpartiesRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\Counterparty\RequestData\GetCounterpartyAddressesRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\Counterparty\RequestData\SaveCounterpartyRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\Counterparty\RequestData\UpdateCounterpartyRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\Counterparty\ResponseData\CatalogCounterpartyData;
use Sashalenz\NovaPoshtaApi\ApiModels\Counterparty\ResponseData\CounterpartyAddressData;
use Sashalenz\NovaPoshtaApi\ApiModels\Counterparty\ResponseData\CounterpartyContactPersonData;
use Sashalenz\NovaPoshtaApi\ApiModels\Counterparty\ResponseData\CounterpartyData;
use Sashalenz\NovaPoshtaApi\ApiModels\Counterparty\ResponseData\CounterpartyOptionsData;
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;
use Sashalenz\NovaPoshtaApi\RequestData\RefRequest;
use Sashalenz\NovaPoshtaApi\ResponseData\RefData;
use Spatie\LaravelData\DataCollection;

final class Counterparty extends BaseModel
{
    /**
     * @throws NovaPoshtaException
     */
    public function getCounterparties(GetCounterpartiesRequest $request): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toCollection(CounterpartyData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getCounterpartyContactPersons(RefRequest $request): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toCollection(CounterpartyContactPersonData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getCounterpartyOptions(RefRequest $request): CounterpartyOptionsData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(CounterpartyOptionsData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getCounterpartyAddresses(GetCounterpartyAddressesRequest $request): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toCollection(CounterpartyAddressData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getCatalogCounterparty(GetCatalogCounterpartyRequest $request): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toCollection(CatalogCounterpartyData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function save(SaveCounterpartyRequest $request): CounterpartyData
    {
        $response = $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->first();

        if (array_key_exists('ContactPerson', $response)) {
            $response['ContactPerson'] = $response['ContactPerson']['data'];
        }

        return CounterpartyData::from($response);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function update(UpdateCounterpartyRequest $request): CounterpartyData
    {
        $response = $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->first();

        if (array_key_exists('ContactPerson', $response)) {
            $response['ContactPerson'] = $response['ContactPerson']['data'];
        }

        return CounterpartyData::from($response);
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
