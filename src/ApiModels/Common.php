<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels;

use Sashalenz\NovaPoshtaApi\BaseModel;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Common\BackwardDeliveryCargoTypeData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Common\CargoDescriptionListData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Common\CargoTypeData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Common\OwnershipFormData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Common\PackListData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Common\PalletsListData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Common\PaymentFormData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Common\ServiceTypeData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Common\TimeIntervalData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Common\TiresWheelsListData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Common\TypesOfCounterpartiesData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Common\TypesOfPayersData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Common\TypesOfPayersForRedeliveryData;
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;
use Illuminate\Support\Collection;

final class Common extends BaseModel
{
    public string $recipientCityRef;
    public string $length;
    public string $width;
    public string $height;
    public string $typeOfPacking;
    public string $findByString;

    public function setRecipientCityRef(string $recipientCityRef): self
    {
        $this->recipientCityRef = $recipientCityRef;
        return $this;
    }

    public function setLength(string $length): self
    {
        $this->length = $length;
        return $this;
    }

    public function setWidth(string $width): self
    {
        $this->width = $width;
        return $this;
    }

    public function setHeight(string $height): self
    {
        $this->height = $height;
        return $this;
    }

    public function setTypeOfPacking(string $typeOfPacking): self
    {
        $this->typeOfPacking = $typeOfPacking;
        return $this;
    }

    public function setFindByString(string $findByString): self
    {
        $this->findByString = $findByString;
        return $this;
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getOwnershipFormsList() : Collection
    {
        $ownershipFormsList = $this
            ->setCalledMethod(__FUNCTION__)
            ->cache(60 * 60 * 24 * 7)
            ->request()
            ->toArray();

        return OwnershipFormData::arrayFromArray($ownershipFormsList);
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getServiceTypes() : Collection
    {
        $serviceTypes = $this
            ->setCalledMethod(__FUNCTION__)
            ->cache(60 * 60 * 24 * 7)
            ->request()
            ->toArray();

        return ServiceTypeData::arrayFromArray($serviceTypes);
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getTimeIntervals() : Collection
    {
        $this->validate([
            'RecipientCityRef' => ['uuid', 'required']
        ]);

        $timeIntervals = $this
            ->setCalledMethod(__FUNCTION__)
            ->cache(60 * 60 * 24 * 7)
            ->request()
            ->toArray();

        return TimeIntervalData::arrayFromArray($timeIntervals);
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getCargoTypes() : Collection
    {
        $cargoTypes = $this
            ->setCalledMethod(__FUNCTION__)
            ->cache(60 * 60 * 24 * 7)
            ->request()
            ->toArray();

        return CargoTypeData::arrayFromArray($cargoTypes);
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getBackwardDeliveryCargoTypes() : Collection
    {
        $backwardDeliveryCargoTypes = $this
            ->setCalledMethod(__FUNCTION__)
            ->cache(60 * 60 * 24 * 7)
            ->request()
            ->toArray();

        return BackwardDeliveryCargoTypeData::arrayFromArray($backwardDeliveryCargoTypes);
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getPalletsList() : Collection
    {
        $palletsList = $this
            ->setCalledMethod(__FUNCTION__)
            ->cache(60 * 60 * 24 * 7)
            ->request()
            ->toArray();

        return PalletsListData::arrayFromArray($palletsList);
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getTypesOfPayers() : Collection
    {
        $typesOfPayers = $this
            ->setCalledMethod(__FUNCTION__)
            ->cache(60 * 60 * 24 * 7)
            ->request()
            ->toArray();

        return TypesOfPayersData::arrayFromArray($typesOfPayers);
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getTypesOfPayersForRedelivery() : Collection
    {
        $typesOfPayersForRedelivery = $this
            ->setCalledMethod(__FUNCTION__)
            ->cache(60 * 60 * 24 * 7)
            ->request()
            ->toArray();

        return TypesOfPayersForRedeliveryData::arrayFromArray($typesOfPayersForRedelivery);
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getPackList() : Collection
    {
        $this->validate([
            'Length' => ['nullable', 'string', 'max:50'],
            'Width' => ['nullable', 'string', 'max:50'],
            'Height' => ['nullable', 'string', 'max:50'],
            'TypeOfPacking' => ['nullable', 'string', 'max:50']
        ]);

        $packList = $this
            ->setCalledMethod(__FUNCTION__)
            ->cache(60 * 60 * 24 * 7)
            ->request()
            ->toArray();

        return PackListData::arrayFromArray($packList);
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getTiresWheelsList() : Collection
    {
        $tiresWheelsList = $this
            ->setCalledMethod(__FUNCTION__)
            ->cache(60 * 60 * 24 * 7)
            ->request()
            ->toArray();

        return TiresWheelsListData::arrayFromArray($tiresWheelsList);
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getCargoDescriptionList() : Collection
    {
        $this->validate([
            'FindByString' => ['nullable', 'string', 'max:50']
        ]);

        $cargoDescriptionList = $this
            ->setCalledMethod(__FUNCTION__)
            ->cache(60 * 60 * 24 * 7)
            ->request()
            ->toArray();

        return CargoDescriptionListData::arrayFromArray($cargoDescriptionList);
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getTypesOfCounterparties() : Collection
    {
        $typesOfCounterparties = $this
            ->setCalledMethod(__FUNCTION__)
            ->cache(60 * 60 * 24 * 7)
            ->request()
            ->toArray();

        return TypesOfCounterpartiesData::arrayFromArray($typesOfCounterparties);
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getPaymentForms() : Collection
    {
        $paymentForms = $this
            ->setCalledMethod(__FUNCTION__)
            ->cache(60 * 60 * 24 * 7)
            ->request()
            ->toArray();

        return PaymentFormData::arrayFromArray($paymentForms);
    }
}
