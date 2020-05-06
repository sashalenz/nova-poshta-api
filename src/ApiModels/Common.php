<?php

namespace A20\Services\NovaPoshta\ApiModels;

use A20\Services\NovaPoshta\BaseModel;
use A20\Services\NovaPoshta\DataTransferObjects\Common\OwnershipFormData;
use A20\Services\NovaPoshta\Exceptions\NovaPoshtaException;
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
}
