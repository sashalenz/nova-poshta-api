<?php

namespace Sashalenz\NovaPoshta\ApiModels;

use Sashalenz\NovaPoshta\AdditionalModel;

final class BackwardDeliveryData extends AdditionalModel
{
    public string $payerType;
    public string $cargoType;
    public string $redeliveryString;
    public array $services;

    /**
     * @param string $payerType
     * @return $this
     */
    public function setPayerType(string $payerType): self
    {
        $this->payerType = $payerType;
        return $this;
    }

    /**
     * @param string $cargoType
     * @return $this
     */
    public function setCargoType(string $cargoType): self
    {
        $this->cargoType = $cargoType;
        return $this;
    }

    /**
     * @param string $redeliveryString
     * @return $this
     */
    public function setRedeliveryString(string $redeliveryString): self
    {
        $this->redeliveryString = $redeliveryString;
        return $this;
    }

    /**
     * @param array $services
     * @return $this
     */
    public function setServices(array $services): self
    {
        $this->services = $services;
        return $this;
    }
}
