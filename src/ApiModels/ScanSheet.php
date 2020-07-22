<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels;

use Sashalenz\NovaPoshtaApi\BaseModel;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\ScanSheet\ScanSheetData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\ScanSheet\ScanSheetListData;
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;
use Illuminate\Support\Collection;

final class ScanSheet extends BaseModel
{
    public string $ref;
    public ?array $documentRefs = [];
    public ?array $scanSheetRefs = [];
    public int $date;

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
     * @param string $documentRef
     * @return $this
     */
    public function addDocumentRef(string $documentRef): self
    {
        $this->documentRefs[] = $documentRef;
        return $this;
    }

    /**
     * @param array $documentRefs
     * @return $this
     */
    public function addDocumentRefs(array $documentRefs): self
    {
        $this->documentRefs = array_merge($this->documentRefs, $documentRefs);
        return $this;
    }

    /**
     * @param string $scanSheetRef
     * @return $this
     */
    public function addScanSheetRef(string $scanSheetRef): self
    {
        $this->scanSheetRefs[] = $scanSheetRef;
        return $this;
    }

    /**
     * @param int $date
     * @return $this
     */
    public function setDate(int $date): self
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getScanSheetList() : Collection
    {
        $scanSheetList = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->toArray();

        return ScanSheetListData::arrayFromArray($scanSheetList);
    }

    /**
     * @return ScanSheetData
     * @throws NovaPoshtaException
     */
    public function getScanSheet(): ScanSheetData
    {
        $this->validate([
            'Ref' => ['required', 'uuid']
        ]);

        $scanSheet = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->first();

        return ScanSheetData::fromArray($scanSheet);
    }

    /**
     * @return ScanSheetData
     * @throws NovaPoshtaException
     */
    public function insertDocuments(): ScanSheetData
    {
        $this->validate([
            'Ref' => ['nullable', 'uuid'],
            'DocumentRefs.*' => ['required', 'uuid']
        ]);

        $scanSheet = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->first();

        return ScanSheetData::fromArray($scanSheet);
    }

    /**
     * @return bool
     * @throws NovaPoshtaException
     */
    public function removeDocuments(): bool
    {
        $this->validate([
            'Ref' => ['nullable', 'uuid'],
            'DocumentRefs.*' => ['required', 'uuid']
        ]);

        return $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->isNotEmpty();
    }

    /**
     * @return bool
     * @throws NovaPoshtaException
     */
    public function deleteScanSheet(): bool
    {
        $this->validate([
            'ScanSheetRefs.*' => ['required', 'uuid']
        ]);

        return $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->isNotEmpty();
    }
}
