<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels;

use Sashalenz\NovaPoshtaApi\BaseModel;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\TrackingDocument\StatusDocumentData;
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;
use Illuminate\Support\Collection;

final class TrackingDocument extends BaseModel
{
    public array $documents;

    public function setDocuments(array $documents) : self
    {
        $this->documents = $documents;
        return $this;
    }

    public function addDocument(string $documentNumber, string $phone = '') : self
    {
        $this->documents[] = [
            'DocumentNumber' => $documentNumber,
            'Phone' => $phone
        ];

        return $this;
    }

    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getStatusDocuments() : Collection
    {
        $this->validate([
            'Documents.*.DocumentNumber' => ['required', 'string', 'max:36'],
            'Documents.*.Phone' => ['nullable', 'string', 'max:36']
        ]);

        $statusDocuments = $this
            ->setCalledMethod(__FUNCTION__)
            ->request()
            ->toArray();

        return StatusDocumentData::arrayFromArray($statusDocuments);
    }
}
