<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Common;

use Sashalenz\NovaPoshtaApi\ApiModels\BaseModel;
use Sashalenz\NovaPoshtaApi\ApiModels\Common\RequestData\GetCargoDescriptionListRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\Common\RequestData\GetPackListRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\Common\RequestData\GetTimeIntervalsRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\Common\ResponseData\BackwardDeliveryCargoTypeData;
use Sashalenz\NovaPoshtaApi\ApiModels\Common\ResponseData\CargoDescriptionData;
use Sashalenz\NovaPoshtaApi\ApiModels\Common\ResponseData\CargoTypeData;
use Sashalenz\NovaPoshtaApi\ApiModels\Common\ResponseData\MessageCodeTextData;
use Sashalenz\NovaPoshtaApi\ApiModels\Common\ResponseData\OwnershipFormData;
use Sashalenz\NovaPoshtaApi\ApiModels\Common\ResponseData\PackData;
use Sashalenz\NovaPoshtaApi\ApiModels\Common\ResponseData\PalletData;
use Sashalenz\NovaPoshtaApi\ApiModels\Common\ResponseData\TimeIntervalData;
use Sashalenz\NovaPoshtaApi\ApiModels\Common\ResponseData\TireWheelData;
use Sashalenz\NovaPoshtaApi\ApiModels\Common\ResponseData\TypeOfPayersForRedeliveryData;
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;
use Spatie\LaravelData\DataCollection;

final class Common extends BaseModel
{
    /**
     * @throws NovaPoshtaException
     */
    public function getTimeIntervals(GetTimeIntervalsRequest $request): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toCollection(TimeIntervalData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getCargoTypes(): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->toCollection(CargoTypeData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getBackwardDeliveryCargoTypes(): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->toCollection(BackwardDeliveryCargoTypeData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getPalletsList(): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->toCollection(PalletData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getTypesOfPayersForRedelivery(): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->toCollection(TypeOfPayersForRedeliveryData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getPackList(?GetPackListRequest $request = null): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toCollection(PackData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getTiresWheelsList(): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->toCollection(TireWheelData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getOwnershipFormsList(): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->toCollection(OwnershipFormData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getCargoDescriptionList(?GetCargoDescriptionListRequest $request = null): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toCollection(CargoDescriptionData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getMessageCodeText(): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->toCollection(MessageCodeTextData::class);
    }
}
