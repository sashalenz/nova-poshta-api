<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\TrackingDocument;

use Sashalenz\NovaPoshtaApi\ApiModels\BaseModel;
use Sashalenz\NovaPoshtaApi\ApiModels\TrackingDocument\RequestData\GetStatusDocumentsRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\TrackingDocument\ResponseData\StatusDocumentData;
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;
use Spatie\LaravelData\DataCollection;

final class TrackingDocument extends BaseModel
{
    /**
     * @throws NovaPoshtaException
     */
    public function getStatusDocuments(GetStatusDocumentsRequest $request): DataCollection
    {
        return $this
            ->calledMethod(__FUNCTION__)
            ->params($request)
            ->toCollection(StatusDocumentData::class);
    }
}
