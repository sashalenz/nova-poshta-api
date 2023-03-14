<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService;

use Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\RequestData\CheckPossibilityChangeEWRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\RequestData\CheckPossibilityCreateReturnRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\RequestData\GetOrdersListRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\RequestData\GetReturnReasonsSubtypesRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\RequestData\SaveAdditionalServiceRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\ResponseData\AdditionalServiceDeleteData;
use Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\ResponseData\AdditionalServiceSaveData;
use Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\ResponseData\ChangeEWOrderData;
use Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\ResponseData\CheckPossibilityChangeEWData;
use Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\ResponseData\CheckPossibilityCreateReturnData;
use Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\ResponseData\CheckPossibilityForRedirectingData;
use Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\ResponseData\RedirectOrderData;
use Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\ResponseData\ReturnOrderData;
use Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\ResponseData\ReturnReasonData;
use Sashalenz\NovaPoshtaApi\ApiModels\AdditionalService\ResponseData\ReturnReasonSubtypeData;
use Sashalenz\NovaPoshtaApi\ApiModels\BaseModel;
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;
use Sashalenz\NovaPoshtaApi\RequestData\RefRequest;
use Spatie\LaravelData\DataCollection;

final class AdditionalService extends BaseModel
{
    /**
     * @throws NovaPoshtaException
     */
    public function checkPossibilityCreateReturn(CheckPossibilityCreateReturnRequest $request): CheckPossibilityCreateReturnData
    {
        return $this
            ->calledMethod('CheckPossibilityCreateReturn')
            ->params($request)
            ->toData(CheckPossibilityCreateReturnData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function checkPossibilityForRedirecting(CheckPossibilityCreateReturnRequest $request): CheckPossibilityForRedirectingData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(CheckPossibilityForRedirectingData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function checkPossibilityChangeEW(CheckPossibilityChangeEWRequest $request): CheckPossibilityChangeEWData
    {
        return $this
            ->calledMethod('CheckPossibilityChangeEW')
            ->params($request)
            ->toData(CheckPossibilityChangeEWData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getReturnReasons(): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->toCollection(ReturnReasonData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getReturnReasonsSubtypes(GetReturnReasonsSubtypesRequest $request): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toCollection(ReturnReasonSubtypeData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function save(SaveAdditionalServiceRequest $request): AdditionalServiceSaveData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(AdditionalServiceSaveData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function delete(RefRequest $request): AdditionalServiceDeleteData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(AdditionalServiceDeleteData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getReturnOrdersList(?GetOrdersListRequest $request = null): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toCollection(ReturnOrderData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getRedirectionOrdersList(?GetOrdersListRequest $request = null): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toCollection(RedirectOrderData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getChangeEWOrdersList(?GetOrdersListRequest $request = null): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toCollection(ChangeEWOrderData::class);
    }
}
