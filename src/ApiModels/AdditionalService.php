<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels;

use Illuminate\Support\Collection;
use Sashalenz\NovaPoshtaApi\BaseModel;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\AdditionalService\AdditionalServiceData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\AdditionalService\CreateReturnPossibilityData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\AdditionalService\ReturnOrdersListData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\AdditionalService\ReturnReasonData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\AdditionalService\ReturnReasonsSubtypeData;
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;
use Sashalenz\NovaPoshtaApi\Rules\PaymentMethodRule;

final class AdditionalService extends BaseModel
{
    public string $ref;
    public string $number;
    public string $reasonRef;
    public string $intDocNumber;
    public string $paymentMethod;
    public string $reason;
    public string $subtypeReason;
    public string $note;
    public string $orderType;
    public string $returnAddressRef;

    /**
     * @param string $ref
     * @return $this
     */
    public function setRef(string $ref): self
    {
        $this->ref = $ref;
        return $this;
    }

    /**
     * @param string $number
     * @return $this
     */
    public function setNumber(string $number): self
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @param string $reasonRef
     * @return $this
     */
    public function setReasonRef(string $reasonRef): self
    {
        $this->reasonRef = $reasonRef;
        return $this;
    }

    /**
     * @param string $intDocNumber
     * @return $this
     */
    public function setIntDocNumber(string $intDocNumber): self
    {
        $this->intDocNumber = $intDocNumber;
        return $this;
    }

    /**
     * @param string $paymentMethod
     * @return $this
     */
    public function setPaymentMethod(string $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    /**
     * @param string $reason
     * @return $this
     */
    public function setReason(string $reason): self
    {
        $this->reason = $reason;
        return $this;
    }

    /**
     * @param string $subtypeReason
     * @return $this
     */
    public function setSubtypeReason(string $subtypeReason): self
    {
        $this->subtypeReason = $subtypeReason;
        return $this;
    }

    /**
     * @param string $note
     * @return $this
     */
    public function setNote(string $note): self
    {
        $this->note = $note;
        return $this;
    }

    /**
     * @param string $orderType
     * @return $this
     */
    private function setOrderType(string $orderType): self
    {
        $this->orderType = $orderType;
        return $this;
    }

    /**
     * @param string $returnAddressRef
     * @return $this
     */
    public function setReturnAddressRef(string $returnAddressRef): self
    {
        $this->returnAddressRef = $returnAddressRef;
        return $this;
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function CheckPossibilityCreateReturn(): Collection
    {
        $this->validate([
            'Number' => ['required', 'uuid', 'max:36']
        ]);

        $data = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->toArray();

        return CreateReturnPossibilityData::arrayFromArray($data);
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getReturnReasons(): Collection
    {
        $data = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->toArray();

        return ReturnReasonData::arrayFromArray($data);
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getReturnReasonsSubtypes(): Collection
    {
        $this->validate([
            'ReasonRef' => ['required', 'uuid']
        ]);

        $data = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->toArray();

        return ReturnReasonsSubtypeData::arrayFromArray($data);
    }

    /**
     * @return AdditionalServiceData
     * @throws NovaPoshtaException
     */
    public function orderCargoReturn(): AdditionalServiceData
    {
        $this->setOrderType(__FUNCTION__);
        return $this->save();
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getReturnOrdersList() : Collection
    {
        $this->validate([
            'Ref' => ['nullable', 'uuid'],
            'Number' => ['nullable', 'string', 'max:36'],
        ]);

        $data = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->toArray();

        return ReturnOrdersListData::arrayFromArray($data);
    }

    /**
     * @return AdditionalServiceData
     * @throws NovaPoshtaException
     */
    public function save(): AdditionalServiceData
    {
        $this->validate([
            'IntDocNumber' => ['string', 'max:36', 'required'],
            'PaymentMethod' => [new PaymentMethodRule(), 'required'],
            'Reason' => ['uuid', 'required'],
            'SubtypeReason' => ['uuid', 'required'],
            'Note' => ['nullable', 'string', 'max:100'],
            'OrderType' => ['required', 'in:orderCargoReturn'],
            'ReturnAddressRef' => ['required_with:OrderType,orderCargoReturn', 'uuid']
        ]);

        $data = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->first();

        return AdditionalServiceData::fromArray($data);
    }

    /**
     * @return bool
     * @throws NovaPoshtaException
     */
    public function delete(): bool
    {
        $this->validate([
            'Ref' => ['required', 'uuid']
        ]);

        return $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->isNotEmpty();
    }
}
