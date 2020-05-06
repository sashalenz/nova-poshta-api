<?php

namespace A20\Services\NovaPoshta\ApiModels;

use A20\Services\NovaPoshta\BaseModel;
use A20\Services\NovaPoshta\DataTransferObjects\InternetDocument\DocumentData;
use A20\Services\NovaPoshta\DataTransferObjects\InternetDocument\DocumentDeliveryDateData;
use A20\Services\NovaPoshta\DataTransferObjects\InternetDocument\DocumentListData;
use A20\Services\NovaPoshta\DataTransferObjects\InternetDocument\DocumentPriceData;
use A20\Services\NovaPoshta\Exceptions\NovaPoshtaException;
use A20\Services\NovaPoshta\Rules\CargoTypeRule;
use A20\Services\NovaPoshta\Rules\PayerTypeRule;
use A20\Services\NovaPoshta\Rules\PaymentMethodRule;
use A20\Services\NovaPoshta\Rules\ServiceTypeRule;
use Illuminate\Support\Collection;

final class InternetDocument extends BaseModel
{
//    sender
    public string $citySender;
    public string $sender;
    public string $senderAddress;
    public string $contactSender;
    public string $sendersPhone;
//    recipient
    public string $cityRecipient;
    public string $recipient;
    public string $recipientAddress;
    public string $contactRecipient;
    public string $recipientsPhone;

//    public string $recipientWarehouse;

    public int $weight;
    public string $serviceType;
    public int $cost;
    public string $cargoType;
    public string $seatsAmount;
    public array $packCalculate;
    public array $redeliveryCalculate;
    public int $packCount;
    public int $packRef;
    public int $amount;
    public string $cargoDetails;
    public string $dateTime;
    public string $dateTimeFrom;
    public string $dateTimeTo;
    public bool $getFullList;
    public bool $redeliveryMoney;
    public bool $unassembledCargo;
    public string $payerType;
    public string $paymentMethod;
    public string $description;

    /**
     * @param string $citySender
     * @return $this
     */
    public function setCitySender(string $citySender) : self
    {
        $this->citySender = $citySender;

        return $this;
    }

    /**
     * @param string $cityRecipient
     * @return $this
     */
    public function setCityRecipient(string $cityRecipient) : self
    {
        $this->cityRecipient = $cityRecipient;

        return $this;
    }

    /**
     * @param int $weight
     * @return $this
     */
    public function setWeight(int $weight) : self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @param string $serviceType
     * @return $this
     */
    public function setServiceType(string $serviceType) : self
    {
        $this->serviceType = $serviceType;

        return $this;
    }

    /**
     * @param int $cost
     * @return $this
     */
    public function setCost(int $cost) : self
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * @param string $cargoType
     * @return $this
     */
    public function setCargoType(string $cargoType) : self
    {
        $this->cargoType = $cargoType;

        return $this;
    }

    /**
     * @param string $seatsAmount
     * @return $this
     */
    public function setSeatsAmount(string $seatsAmount) : self
    {
        $this->seatsAmount = $seatsAmount;

        return $this;
    }

    /**
     * @param int $packCount
     * @return $this
     */
    public function setPackCount(int $packCount) : self
    {
        $this->packCount = $packCount;

        return $this;
    }

    /**
     * @param int $packRef
     * @return $this
     */
    public function setPackRef(int $packRef) : self
    {
        $this->packRef = $packRef;

        return $this;
    }

    /**
     * @param int $amount
     * @return $this
     */
    public function setAmount(int $amount) : self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param int $dateTime
     * @return $this
     */
    public function setDateTime(int $dateTime) : self
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * @param string $dateTimeFrom
     * @return $this
     */
    public function setDateTimeFrom(string $dateTimeFrom) : self
    {
        $this->dateTimeFrom = $dateTimeFrom;

        return $this;
    }

    /**
     * @param string $dateTimeTo
     * @return $this
     */
    public function setDateTimeTo(string $dateTimeTo) : self
    {
        $this->dateTimeTo = $dateTimeTo;

        return $this;
    }

    /**
     * @param bool $getFullList
     * @return $this
     */
    public function setGetFullList(bool $getFullList) : self
    {
        $this->getFullList = $getFullList;

        return $this;
    }

    /**
     * @param bool $redeliveryMoney
     * @return $this
     */
    public function setRedeliveryMoney(bool $redeliveryMoney) : self
    {
        $this->redeliveryMoney = $redeliveryMoney;

        return $this;
    }

    /**
     * @param bool $unassembledCargo
     * @return $this
     */
    public function setUnassembledCargo(bool $unassembledCargo) : self
    {
        $this->unassembledCargo = $unassembledCargo;

        return $this;
    }

    /**
     * @param string $payerType
     * @return $this
     */
    public function setPayerType(string $payerType) : self
    {
        $this->payerType = $payerType;

        return $this;
    }

    /**
     * @param string $paymentMethod
     * @return $this
     */
    public function setPaymentMethod(string $paymentMethod) : self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description) : self
    {
        $this->description = $description;

        return $this;
    }



    /**
     * @return DocumentPriceData
     * @throws NovaPoshtaException
     */
    public function getDocumentPrice() : DocumentPriceData
    {
        $this->validate([
            'CitySender' => ['required', 'string', 'max:36'],
            'CityRecipient' => ['required', 'string', 'max:36'],
            'Weight' => ['required', 'numeric', 'min:0.1'],
            'ServiceType' => ['required', 'string', new ServiceTypeRule()],
            'Cost' => ['required', 'numeric'],
            'CargoType' => ['required', 'string', new CargoTypeRule()],
            'SeatsAmount' => ['required', 'numeric', 'min:1']
        ]);

        $documentPrice = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->first();

        return DocumentPriceData::fromArray($documentPrice);
    }

    /**
     * @return DocumentDeliveryDateData
     * @throws NovaPoshtaException
     */
    public function getDocumentDeliveryDate() : DocumentDeliveryDateData
    {
        $this->validate([
            'CitySender' => ['required', 'string', 'max:36'],
            'CityRecipient' => ['required', 'string', 'max:36'],
            'ServiceType' => ['required', 'string', new ServiceTypeRule()],
        ]);

        $documentDeliveryDate = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->first();

        return DocumentDeliveryDateData::fromArray($documentDeliveryDate);
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getDocumentList() : Collection
    {
        $this->validate([
            'DateTimeFrom' => ['required', 'date', 'date_format:d.m.Y'],
            'DateTimeTo' => ['required', 'date', 'date_format:d.m.Y'],
            'GetFullList' => ['boolean'],
            'RedeliveryMoney' => ['boolean'],
            'UnassembledCargo' => ['boolean'],
        ]);

        $documentList = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->toArray();

        return DocumentListData::arrayFromArray($documentList);
    }

    /**
     * @return DocumentData
     * @throws NovaPoshtaException
     */
    public function save()
    {
        $this->validate([
            'PayerType' => ['required', 'string', new PayerTypeRule()],
            'PaymentMethod' => ['required', 'string', new PaymentMethodRule()],
            'DateTime' => ['required', 'date', 'date_format:d.m.Y'],
            'CargoType' => ['required', 'string', new CargoTypeRule()],
            'VolumeGeneral' => ['nullable', 'numeric', 'min:0.0004'],
            'Weight' => ['required', 'numeric', 'min:0.1'],
            'ServiceType' => ['required', 'string', new ServiceTypeRule()],
            'SeatsAmount' => ['required', 'numeric', 'min:1'],
            'Description' => ['required', 'string', 'max:50'],
            'Cost' => ['required', 'numeric', 'min:300'],
            'CitySender' => ['required', 'uuid'],
            'Sender' => ['required', 'uuid'],
            'SenderAddress' => ['required', 'uuid'],
            'ContactSender' => ['required', 'uuid'],
            'SendersPhone' => ['required', 'string', 'max:36'],
            'CityRecipient' => ['required', 'uuid'],
            'Recipient' => ['required', 'uuid'],
            'RecipientAddress' => ['required', 'uuid'],
            'ContactRecipient' => ['required', 'uuid'],
            'RecipientsPhone' => ['required', 'string', 'max:36']
        ]);

        $document = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->first();

        return DocumentData::fromArray($document);
    }
}
