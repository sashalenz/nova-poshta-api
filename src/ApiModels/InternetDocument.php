<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels;

use Sashalenz\NovaPoshtaApi\BaseModel;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\InternetDocument\DocumentData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\InternetDocument\DocumentDeliveryDateData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\InternetDocument\DocumentListData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\InternetDocument\DocumentPriceData;
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;
use Sashalenz\NovaPoshtaApi\Rules\CargoTypeRule;
use Sashalenz\NovaPoshtaApi\Rules\PayerTypeRule;
use Sashalenz\NovaPoshtaApi\Rules\PaymentMethodRule;
use Sashalenz\NovaPoshtaApi\Rules\ServiceTypeRule;
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

    public float $weight;
    public string $serviceType;
    public int $cost;
    public string $cargoType;
    public string $seatsAmount;
    public array $optionsSeat;
    public array $cargoDetails;
    public array $packCalculate;
    public array $redeliveryCalculate;
    public int $packCount;
    public int $packRef;
    public int $amount;
    public string $dateTime;
    public string $dateTimeFrom;
    public string $dateTimeTo;
    public bool $getFullList;
    public bool $redeliveryMoney;
    public bool $unassembledCargo;
    public string $payerType;
    public string $paymentMethod;
    public string $description;
    public array $backwardDeliveryData;
    public string $afterpaymentOnGoodsCost;
    public array $documentRefs;

    public function setCitySender(string $citySender) : self
    {
        $this->citySender = $citySender;
        return $this;
    }

    public function setCityRecipient(string $cityRecipient) : self
    {
        $this->cityRecipient = $cityRecipient;
        return $this;
    }

    public function setWeight(float $weight) : self
    {
        $this->weight = $weight;
        return $this;
    }

    public function setServiceType(string $serviceType) : self
    {
        $this->serviceType = $serviceType;
        return $this;
    }

    public function setSender(string $sender): self
    {
        $this->sender = $sender;
        return $this;
    }

    public function setSenderAddress(string $senderAddress): self
    {
        $this->senderAddress = $senderAddress;
        return $this;
    }

    public function setContactSender(string $contactSender): self
    {
        $this->contactSender = $contactSender;
        return $this;
    }

    public function setSendersPhone(string $sendersPhone): self
    {
        $this->sendersPhone = $sendersPhone;
        return $this;
    }

    public function setCost(int $cost) : self
    {
        $this->cost = $cost;
        return $this;
    }

    public function setCargoType(string $cargoType) : self
    {
        $this->cargoType = $cargoType;
        return $this;
    }

    public function setSeatsAmount(string $seatsAmount) : self
    {
        $this->seatsAmount = $seatsAmount;
        return $this;
    }

    public function setPackCount(int $packCount) : self
    {
        $this->packCount = $packCount;
        return $this;
    }

    public function setPackRef(int $packRef) : self
    {
        $this->packRef = $packRef;
        return $this;
    }

    public function setAmount(int $amount) : self
    {
        $this->amount = $amount;
        return $this;
    }

    public function setDateTime(string $dateTime) : self
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    public function setDateTimeFrom(string $dateTimeFrom) : self
    {
        $this->dateTimeFrom = $dateTimeFrom;
        return $this;
    }

    public function setDateTimeTo(string $dateTimeTo) : self
    {
        $this->dateTimeTo = $dateTimeTo;
        return $this;
    }

    public function setGetFullList(bool $getFullList) : self
    {
        $this->getFullList = $getFullList;
        return $this;
    }

    public function setRedeliveryMoney(bool $redeliveryMoney) : self
    {
        $this->redeliveryMoney = $redeliveryMoney;
        return $this;
    }

    public function setUnassembledCargo(bool $unassembledCargo) : self
    {
        $this->unassembledCargo = $unassembledCargo;
        return $this;
    }

    public function setPayerType(string $payerType) : self
    {
        $this->payerType = $payerType;
        return $this;
    }

    public function setPaymentMethod(string $paymentMethod) : self
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    public function setDescription(string $description) : self
    {
        $this->description = $description;
        return $this;
    }

    public function setRecipient(string $recipient): self
    {
        $this->recipient = $recipient;
        return $this;
    }

    public function setContactRecipient(string $contactRecipient): self
    {
        $this->contactRecipient = $contactRecipient;
        return $this;
    }

    public function setRecipientAddress(string $recipientAddress): self
    {
        $this->recipientAddress = $recipientAddress;
        return $this;
    }

    public function setRecipientsPhone(string $recipientsPhone): self
    {
        $this->recipientsPhone = $recipientsPhone;
        return $this;
    }

    public function setDocumentRef(string $documentRef): self
    {
        $this->documentRefs[] = $documentRef;
        return $this;
    }

    public function setOptionsSeat(array $optionsSeat): self
    {
        $this->optionsSeat = $optionsSeat;
        return $this;
    }

    public function setCargoDetails(array $cargoDetails): self
    {
        $this->cargoDetails = $cargoDetails;
        return $this;
    }

    public function setBackwardDeliveryData(BackwardDeliveryData $backwardDeliveryData): self
    {
        $this->backwardDeliveryData[] = $backwardDeliveryData->toArray();
        return $this;
    }

    public function addAfterpaymentOnGoodsCost(string $afterpaymentOnGoodsCost): self
    {
        $this->afterpaymentOnGoodsCost = $afterpaymentOnGoodsCost;
        return $this;
    }

    public function addRedeliveryCost(int $redeliveryCost, string $payerType = 'Recipient'): self
    {
        $this->setBackwardDeliveryData(
            BackwardDeliveryData::make()
                ->setPayerType($payerType)
                ->setCargoType('Money')
                ->setRedeliveryString($redeliveryCost)
        );

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
            'Weight' => ['required_if:CargoType,Cargo', 'numeric', 'min:0.1'],
            'ServiceType' => ['required', 'string', new ServiceTypeRule()],
            'SeatsAmount' => ['required_if:CargoType,Cargo', 'numeric', 'min:1'],
            'OptionsSeat' => ['required_if:CargoType,Cargo', 'array'],
            'CargoDetails' => ['required_if:CargoType,TiresWheels', 'array'],
            'Description' => ['required', 'string', 'max:50'],
            'Cost' => ['required', 'numeric', 'min:200'],
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

    /**
     * @throws NovaPoshtaException
     */
    public function delete()
    {
        $this->validate([
            'DocumentRefs.*' => ['required', 'uuid']
        ]);

        $document = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->first();

        return DocumentData::fromArray($document);
    }
}
