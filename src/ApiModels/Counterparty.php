<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels;

use Sashalenz\NovaPoshtaApi\BaseModel;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\ContactPerson\ContactPersonData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Counterparty\AddressData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Counterparty\CounterpartyData;
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;
use Sashalenz\NovaPoshtaApi\Rules\CounterpartyTypeRule;
use Illuminate\Support\Collection;

final class Counterparty extends BaseModel
{
    public string $ref;
    public string $counterpartyType;
    public string $counterpartyProperty = 'Recipient';
    public string $firstName;
    public ?string $lastName = null;
    public ?string $middleName = null;
    public ?string $email = null;
    public string $phone;
    public int $page;
    public ?string $cityRef = null;
    public ?string $ownershipForm = null;
    public ?int $EDRPOU = null;

    /**
     * @param string $page
     * @return $this
     */
    public function setPage(string $page) : self
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @param string $ref
     * @return $this
     */
    private function setRef(string $ref) : self
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * @param string $counterpartyType
     * @return $this
     */
    public function setCounterpartyType(string $counterpartyType) : self
    {
        $this->counterpartyType = $counterpartyType;

        return $this;
    }

    /**
     * @param string $counterpartyProperty
     * @return $this
     */
    public function setCounterpartyProperty(string $counterpartyProperty) : self
    {
        $this->counterpartyProperty = $counterpartyProperty;

        return $this;
    }

    /**
     * @param string $phone
     * @return $this
     */
    public function setPhone(string $phone) : self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName(string $firstName) : self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastName(string $lastName) : self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @param string|null $middleName
     * @return $this
     */
    public function setMiddleName(?string $middleName = null) : self
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email) : self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param string $ownershipForm
     * @return $this
     */
    public function setOwnershipForm(string $ownershipForm) : self
    {
        $this->ownershipForm = $ownershipForm;

        return $this;
    }

    /**
     * @param string $cityRef
     * @return $this
     */
    public function setCityRef(string $cityRef) : self
    {
        $this->cityRef = $cityRef;

        return $this;
    }

    /**
     * @param int $EDRPOU
     * @return $this
     */
    public function setEDRPOU(int $EDRPOU) : self
    {
        $this->EDRPOU = $EDRPOU;

        return $this;
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getCounterparties() : Collection
    {
        $counterparties =  $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->toArray();

        return CounterpartyData::arrayFromArray($counterparties);
    }

    /**
     * @param string $ref
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getCounterpartyAddresses(string $ref) : Collection
    {
        $this->validate([
            'CounterpartyType' => ['required', 'string', new CounterpartyTypeRule()]
        ]);

        $addresses = $this
            ->setCalledMethod(__FUNCTION__)
            ->setRef($ref)
            ->request()
            ->toArray();

        return AddressData::arrayFromArray($addresses);
    }

    /**
     * @param string $ref
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getCounterpartyContactPersons(string $ref) : Collection
    {
        $contactPersons = $this
            ->setCalledMethod(__FUNCTION__)
            ->setRef($ref)
            ->request()
            ->toArray();

        return ContactPersonData::arrayFromArray($contactPersons);
    }

    /**
     * @return CounterpartyData
     * @throws NovaPoshtaException
     */
    public function save() : CounterpartyData
    {
        $this->validate([
            'FirstName' => ['required', 'string', 'max:36'],
            'LastName' => ['required_if:CounterpartyType,PrivatePerson', 'nullable', 'string', 'max:36'],
            'MiddleName' => ['nullable', 'string', 'max:36'],
            'Phone' => ['required_if:CounterpartyType,PrivatePerson', 'string', 'max:36'],
            'Email' => ['nullable', 'email'],
            'CounterpartyType' => ['required', 'string', new CounterpartyTypeRule()],
            'EDRPOU' => ['required_if:CounterpartyType,Organization', 'nullable', 'numeric'],
            'OwnershipForm' => ['required_if:CounterpartyType,Organization', 'string']
        ]);

        $contactPerson = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->first();

        return CounterpartyData::fromArray($contactPerson);
    }

    /**
     * @param string $ref
     * @return CounterpartyData
     * @throws NovaPoshtaException
     */
    public function update(string $ref) : CounterpartyData
    {
        $this->validate([
            'FirstName' => ['required', 'string', 'max:36'],
            'LastName' => ['required', 'string', 'max:36'],
            'MiddleName' => ['nullable', 'string', 'max:36'],
            'Phone' => ['required', 'string', 'max:36'],
            'Email' => ['nullable', 'email'],
            'CounterpartyType' => ['required', 'string', new CounterpartyTypeRule()]
        ]);

        $contactPerson = $this
            ->setCalledMethod(__FUNCTION__)
            ->setRef($ref)
            ->request()
            ->first();

        return CounterpartyData::fromArray($contactPerson);
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
