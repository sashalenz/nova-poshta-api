<?php

namespace Sashalenz\NovaPoshtaApi\DataTransferObjects\AdditionalService;

use Sashalenz\NovaPoshtaApi\DataTransferObjects\DataTransferObject;

class ReturnOrdersListData extends DataTransferObject
{
    public string $orderRef;
    public string $orderNumber;
    public string $orderStatus;
    public string $documentNumber;
    public string $counterpartyRecipient;
    public string $contactPersonRecipient;
    public string $addressRecipient;
    public string $deliveryCost;
    public string $estimatedDeliveryDate;
    public string $expressWaybillNumber;
    public string $expressWaybillStatus;


    public static function fromArray($array)
    {
        return new self([
            'orderRef' => $array['OrderRef'],
            'orderNumber' => $array['OrderNumber'],
            'orderStatus' => $array['OrderStatus'],
            'documentNumber' => $array['DocumentNumber'],
            'counterpartyRecipient' => $array['CounterpartyRecipient'],
            'contactPersonRecipient' => $array['ContactPersonRecipient'],
            'addressRecipient' => $array['AddressRecipient'],
            'deliveryCost' => $array['DeliveryCost'],
            'estimatedDeliveryDate' => $array['EstimatedDeliveryDate'],
            'expressWaybillNumber' => $array['ExpressWaybillNumber'],
            'expressWaybillStatus' => $array['ExpressWaybillStatus']
        ]);
    }
}
