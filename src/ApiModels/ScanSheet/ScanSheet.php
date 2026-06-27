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
     * Raw `data[0]` for insertDocuments — Ref/Number plus the per-document
     * rejection details (`Data.Errors`/`Warnings`) and item-level Errors/Warnings
     * that {@see InsertScanSheetData} discards. For callers that must surface
     * NP's partial-failure reasons (e.g. building a registry / scan sheet where a
     * subset of TTNs is rejected). Envelope-level errors still throw via Request.
     *
     * @return array<string, mixed>
     *
     * @throws NovaPoshtaException
     */
    public function insertDocumentsRaw(InsertDocumentsRequest $request): array
    {
        return $this
            ->calledMethod('insertDocuments')
            ->params($request)
            ->first();
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
