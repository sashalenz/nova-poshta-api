<?php

namespace A20\Services\NovaPoshta\DataTransferObjects\InternetDocument;

use A20\Services\NovaPoshta\DataTransferObjects\DataTransferObject;
use Carbon\Carbon;

class DocumentListData extends DataTransferObject
{
    public string $ref;
    public Carbon $dateTime;
    public Carbon $preferredDeliveryDate;
    public float $weight;
    public int $seatsAmount;
    public int $intDocNumber;
    public int $cost;
    public string $citySender;
    public string $cityRecipient;
    public string $senderAddress;
    public string $recipientAddress;
    public int $costOnSite;
    public string $payerType;
    public string $paymentMethod;
    public string $afterpaymentOnGoodsCost;
    public string $packingNumber;
    public ?string $rejectionReason = null;
    public Carbon $estimatedDeliveryDate;
    public Carbon $dateLastUpdatedStatus;
    public Carbon $createTime;
    public array $optionsSeat;

    public static function fromArray($array)
    {
        return new self([
            'ref' => $array['Ref'],
            'dateTime' => Carbon::createFromFormat('Y-m-d H:i:s', $array['DateTime']),
            'preferredDeliveryDate' => Carbon::createFromFormat('Y-m-d H:i:s', $array['PreferredDeliveryDate']),
            'weight' => (float) $array['Weight'],
            'seatsAmount' => (int) $array['SeatsAmount'],
            'intDocNumber' => (int) $array['IntDocNumber'],
            'cost' => (int) $array['Cost'],
            'citySender' => $array['CitySender'],
            'cityRecipient' => $array['CityRecipient'],
            'senderAddress' => $array['SenderAddress'],
            'recipientAddress' => $array['RecipientAddress'],
            'costOnSite' => (int) $array['CostOnSite'],
            'payerType' => $array['PayerType'],
            'paymentMethod' => $array['PaymentMethod'],
            'afterpaymentOnGoodsCost' => $array['AfterpaymentOnGoodsCost'],
            'packingNumber' => $array['PackingNumber'],
            'rejectionReason' => $array['RejectionReason'],
            'estimatedDeliveryDate' => Carbon::createFromFormat('Y-m-d H:i:s', $array['EstimatedDeliveryDate']),
            'dateLastUpdatedStatus' => Carbon::createFromFormat('Y-m-d H:i:s', $array['DateLastUpdatedStatus']),
            'createTime' => Carbon::createFromFormat('Y-m-d H:i:s', $array['CreateTime']),
            'optionsSeat' => OptionsSeatData::arrayFromArray($array['OptionsSeat'])
        ]);
    }
}
