<?php

namespace Sashalenz\NovaPoshtaApi;

final class Marking
{
    public static function printMarking(string $type, array $orders, string $apiKey): ?string
    {
        if (! in_array($type, ['html', 'pdf8'])) {
            return null;
        }

        $ordersKey = count($orders) > 1 ? 'orders' : 'orders[]';

        return sprintf('https://my.novaposhta.ua/orders/printMarking85x85/%s/%s/type/%s/apiKey/%s', $ordersKey, implode(',', $orders), $type, $apiKey);
    }

    public static function printZebraMarking(string $type, array $orders, string $apiKey): string
    {
        $ordersKey = count($orders) > 1 ? 'orders' : 'orders[]';

        return sprintf('https://my.novaposhta.ua/orders/printMarking100x100/%s/%s/type/pdf/zebra/zebra/apiKey/%s', $ordersKey, implode(',', $orders), $apiKey);
    }

    public static function printScanSheet(string $ref, string $apiKey): string
    {
        return sprintf('https://my.novaposhta.ua/scanSheet/printScanSheet/refs[]/%s/type/pdf/apiKey/%s', $ref, $apiKey);
    }

    public static function printDocument(array $orders, string $type, string $apiKey): ?string
    {
        if (! in_array($type, ['html', 'pdf'])) {
            return null;
        }

        $ordersKey = count($orders) > 1 ? 'refs' : 'refs[]';

        return sprintf('https://my.novaposhta.ua/scanSheet/printScanSheet/%s/%s/type/%s/apiKey/%s', $ordersKey, implode(',', $orders), $type, $apiKey);
    }
}
