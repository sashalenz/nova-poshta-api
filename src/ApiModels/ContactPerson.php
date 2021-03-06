<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels;

use Sashalenz\NovaPoshtaApi\BaseModel;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\ContactPerson\ContactPersonData;
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;

final class ContactPerson extends BaseModel
{
    public ?string $ref = null;
    public string $counterpartyRef;
    public string $phone;
    public string $firstName;
    public string $lastName;
    public ?string $middleName = null;
    public ?string $email = null;

    private function setRef(string $ref) : self
    {
        $this->ref = $ref;
        return $this;
    }

    public function setCounterpartyRef(string $counterpartyRef) : self
    {
        $this->counterpartyRef = $counterpartyRef;
        return $this;
    }

    public function setPhone(string $phone) : self
    {
        $this->phone = $phone;
        return $this;
    }

    public function setFirstName(string $firstName) : self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function setLastName(string $lastName) : self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function setMiddleName(string $middleName) : self
    {
        $this->middleName = $middleName;
        return $this;
    }

    public function setEmail(string $email) : self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return ContactPersonData
     * @throws NovaPoshtaException
     */
    public function save() : ContactPersonData
    {
        $this->validate([
            'CounterpartyRef' => ['required', 'uuid'],
            'FirstName' => ['required', 'string', 'max:36'],
            'LastName' => ['required', 'string', 'max:36'],
            'MiddleName' => ['nullable', 'string', 'max:36'],
            'Phone' => ['required', 'string', 'max:36'],
        ]);

        $contactPerson = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->first();

        return ContactPersonData::fromArray($contactPerson);
    }

    /**
     * @param string $ref
     * @return ContactPersonData
     * @throws NovaPoshtaException
     */
    public function update(string $ref) : ContactPersonData
    {
        $this->validate([
            'CounterpartyRef' => ['required', 'uuid'],
            'FirstName' => ['required', 'string', 'max:36'],
            'LastName' => ['required', 'string', 'max:36'],
            'MiddleName' => ['nullable', 'string', 'max:36'],
            'Phone' => ['required', 'string', 'max:36'],
        ]);

        $contactPerson = $this
            ->setRef($ref)
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->first();

        return ContactPersonData::fromArray($contactPerson);
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
