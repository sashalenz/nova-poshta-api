<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels;

use Sashalenz\NovaPoshtaApi\BaseModel;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Address\AddressData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Address\AreaData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Address\CityData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Address\SettlementData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Address\SettlementStreetData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Address\StreetData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Address\WarehouseData;
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;
use Illuminate\Support\Collection;

final class Address extends BaseModel
{
    public int $limit;
    public string $ref;
    public string $cityRef;
    public string $cityName;
    public string $settlementRef;
    public string $streetName;
    public string $streetRef;
    public string $counterpartyRef;
    public string $buildingNumber;
    public string $flat;
    public string $note;
    public string $findByString;

    public function setLimit(int $limit) : self
    {
        $this->limit = $limit;
        return $this;
    }

    public function setRef(string $ref) : self
    {
        $this->ref = $ref;
        return $this;
    }

    private function setCityName(string $name) : self
    {
        $this->cityName = $name;
        return $this;
    }

    public function setSettlementRef(string $settlementRef) : self
    {
        $this->settlementRef = $settlementRef;
        return $this;
    }

    private function setStreetName(string $streetName) : self
    {
        $this->streetName = $streetName;
        return $this;
    }

    public function setStreetRef(string $streetRef) : self
    {
        $this->streetRef = $streetRef;
        return $this;
    }

    public function setCounterpartyRef(string $counterpartyRef) : self
    {
        $this->counterpartyRef = $counterpartyRef;
        return $this;
    }

    public function setBuildingNumber(string $buildingNumber) : self
    {
        $this->buildingNumber = $buildingNumber;
        return $this;
    }

    public function setFlat(string $flat) : self
    {
        $this->flat = $flat;
        return $this;
    }

    public function setNote(string $note) : self
    {
        $this->note = $note;
        return $this;
    }

    public function setCityRef(string $cityRef) : self
    {
        $this->cityRef = $cityRef;
        return $this;
    }

    public function setFindByString(string $findByString) : self
    {
        $this->findByString = $findByString;
        return $this;
    }

    /**
     * @param string $search
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function searchSettlements($search = '') : Collection
    {
        $this->setCityName($search);

        $this->validate([
            'Limit' => ['required', 'numeric'],
            'CityName' => ['required', 'string', 'max:36']
        ]);

        $response = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->first();

        return SettlementData::arrayFromArray($response['Addresses']);
    }

    /**
     * @param string $search
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function searchSettlementStreets($search = '') : Collection
    {
        $this->setStreetName($search);

        $this->validate([
            'Limit' => ['required', 'numeric'],
            'StreetName' => ['required', 'string', 'max:36'],
            'SettlementRef' => ['required', 'uuid']
        ]);

        $response = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->first();

        return SettlementStreetData::arrayFromArray($response['Addresses']);
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getAreas() : Collection
    {
        $response = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->toArray();

        return AreaData::arrayFromArray($response);
    }

    /**
     * @param string|null $ref
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getCities(string $ref = null) : Collection
    {
        if (!is_null($ref)) {
            $this->cache(60 * 60 * 24);
            $this->setRef($ref);
        }

        $this->validate([
            'Ref' => ['nullable', 'uuid'],
            'Page' => ['nullable', 'numeric'],
            'FindByString' => ['required_without:Ref', 'string', 'max:36']
        ]);

        $response = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->toArray();

        return CityData::arrayFromArray($response);
    }

    /**
     * @param null $search
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getWarehouses($search = null) : Collection
    {
        $this->validate([
            'CityRef' => ['required', 'uuid']
        ]);

        return $this
            ->setCalledMethod(__FUNCTION__)
            ->cache(60 * 60 * 24)
            ->request()
            ->map(fn ($warehouse) => WarehouseData::fromArray($warehouse))
            ->filter(function ($row) use ($search) {
                if (!$search) {
                    return true;
                }
                return strpos(mb_strtolower($row->description), mb_strtolower($search)) !== false;
            })
            ->values();
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getStreet() : Collection
    {
        $this->validate([
            'CityRef' => ['required', 'uuid'],
            'FindByString' => ['required', 'string', 'max:36'],
            'Page' => ['nullable', 'numeric'],
        ]);

        $response = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->toArray();

        return StreetData::arrayFromArray($response);
    }

    /**
     * @return AddressData
     * @throws NovaPoshtaException
     */
    public function save() : AddressData
    {
        $this->validate([
            'CounterpartyRef' => ['required', 'uuid'],
            'StreetRef' => ['required', 'uuid'],
            'BuildingNumber' => ['required', 'string'],
            'Flat' => ['nullable', 'string']
        ]);

        $contactPerson = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->first();

        return AddressData::fromArray($contactPerson);
    }

    /**
     * @param string $ref
     * @return AddressData
     * @throws NovaPoshtaException
     */
    public function update(string $ref) : AddressData
    {
        $this->validate([
            'CounterpartyRef' => ['required', 'uuid'],
            'StreetRef' => ['required', 'uuid'],
            'BuildingNumber' => ['required', 'string'],
            'Flat' => ['nullable', 'string']
        ]);

        $contactPerson = $this
            ->setCalledMethod(__METHOD__)
            ->setRef($ref)
            ->request()
            ->first();

        return AddressData::fromArray($contactPerson);
    }

    /**
     * @param string $ref
     * @return bool
     * @throws NovaPoshtaException
     */
    public function delete(string $ref) : bool
    {
        return $this
            ->setCalledMethod(__FUNCTION__)
            ->setRef($ref)
            ->request()
            ->isNotEmpty();
    }
}
