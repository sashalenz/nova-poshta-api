<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument;

use Sashalenz\NovaPoshtaApi\ApiModels\BaseModel;
use Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\RequestData\DeleteInternetDocumentRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\RequestData\GetDocumentDeliveryDateRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\RequestData\GetDocumentListRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\RequestData\GetDocumentPriceRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\RequestData\SaveInternetDocumentRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\RequestData\UpdateInternetDocumentRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\ResponseData\DocumentData;
use Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\ResponseData\DocumentDeliveryDateData;
use Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\ResponseData\DocumentListData;
use Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\ResponseData\DocumentPriceData;
use Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\ResponseData\InternetDocumentData;
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;
use Sashalenz\NovaPoshtaApi\RequestData\RefRequest;
use Sashalenz\NovaPoshtaApi\ResponseData\RefData;
use Spatie\LaravelData\DataCollection;

final class InternetDocument extends BaseModel
{
    /**
     * @throws NovaPoshtaException
     */
    public function getDocumentPrice(GetDocumentPriceRequest $request): DocumentPriceData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(DocumentPriceData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getDocumentDeliveryDate(GetDocumentDeliveryDateRequest $request): DocumentDeliveryDateData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(DocumentDeliveryDateData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getDocumentList(GetDocumentListRequest $request): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toCollection(DocumentListData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getDocument(RefRequest $request): DocumentData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(DocumentData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function save(SaveInternetDocumentRequest $request): InternetDocumentData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(InternetDocumentData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function update(UpdateInternetDocumentRequest $request): InternetDocumentData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(InternetDocumentData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function delete(DeleteInternetDocumentRequest $request): RefData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(RefData::class);
    }
}
