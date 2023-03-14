<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\ScanSheet;

use Sashalenz\NovaPoshtaApi\ApiModels\BaseModel;
use Sashalenz\NovaPoshtaApi\ApiModels\ScanSheet\RequestData\GetScanSheetRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\ScanSheet\RequestData\InsertDocumentsRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\ScanSheet\RequestData\RemoveDocumentsRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\ScanSheet\ResponseData\DeleteScanSheetData;
use Sashalenz\NovaPoshtaApi\ApiModels\ScanSheet\ResponseData\InsertScanSheetData;
use Sashalenz\NovaPoshtaApi\ApiModels\ScanSheet\ResponseData\RemoveScanSheetData;
use Sashalenz\NovaPoshtaApi\ApiModels\ScanSheet\ResponseData\ScanSheetData;
use Sashalenz\NovaPoshtaApi\ApiModels\ScanSheet\ResponseData\ScanSheetListData;
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;
use Spatie\LaravelData\DataCollection;

final class ScanSheet extends BaseModel
{
    /**
     * @throws NovaPoshtaException
     */
    public function getScanSheetList(): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->toCollection(ScanSheetListData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function getScanSheet(GetScanSheetRequest $request): ScanSheetData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(ScanSheetData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function insertDocuments(InsertDocumentsRequest $request): InsertScanSheetData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(InsertScanSheetData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function removeDocuments(RemoveDocumentsRequest $request): RemoveScanSheetData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(RemoveScanSheetData::class);
    }

    /**
     * @throws NovaPoshtaException
     */
    public function deleteScanSheet(DeleteScanSheetData $request): DeleteScanSheetData
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toData(DeleteScanSheetData::class);
    }
}
