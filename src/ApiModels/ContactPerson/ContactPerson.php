<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\ContactPerson;

use Sashalenz\NovaPoshtaApi\ApiModels\Address\ResponseData\AddressData;
use Sashalenz\NovaPoshtaApi\ApiModels\BaseModel;
use Sashalenz\NovaPoshtaApi\ApiModels\ContactPerson\RequestData\SaveContactPersonRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\ContactPerson\RequestData\UpdateContactPersonRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\ContactPerson\ResponseData\ContactPersonData;
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;
use Sashalenz\NovaPoshtaApi\RequestData\RefRequest;

final class ContactPerson extends BaseModel
{
    /**
     * @throws NovaPoshtaException
     */
    public function save(SaveContactPersonRequest $request): ContactPersonData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(ContactPersonData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function update(UpdateContactPersonRequest $request): ContactPersonData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(ContactPersonData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function delete(RefRequest $request): AddressData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(AddressData::class);
    }
}
