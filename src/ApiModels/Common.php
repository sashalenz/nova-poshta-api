<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels;

use Sashalenz\NovaPoshtaApi\BaseModel;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Common\OwnershipFormData;
use Sashalenz\NovaPoshtaApi\DataTransferObjects\Common\ServiceTypeData;
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;
use Illuminate\Support\Collection;

final class Common extends BaseModel
{
    /**
     * @return Collection
     * @throws NovaPoshtaException
     */
    public function getOwnershipFormsList() : Collection
    {
        $ownershipFormsList = $this
            ->setCalledMethod(__FUNCTION__)
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
}
