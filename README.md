# Nova Poshta API SDK for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sashalenz/nova-poshta-api.svg?style=flat-square)](https://packagist.org/packages/sashalenz/nova-poshta-api)
[![Total Downloads](https://img.shields.io/packagist/dt/sashalenz/nova-poshta-api.svg?style=flat-square)](https://packagist.org/packages/sashalenz/nova-poshta-api)

A Laravel SDK for the [Nova Poshta](https://developers.novaposhta.ua/documentation) JSON API. Wraps every public NP method behind a fluent, fully-typed builder backed by [`spatie/laravel-data`](https://github.com/spatie/laravel-data) request and response objects, with built-in caching, retries and a typed exception hierarchy.

## Requirements

- PHP 8.2+
- Laravel 10, 11, 12 or 13
- A registered NP business account with an API key ([cabinet → settings → API](https://my.novaposhta.ua/settings/index#apikeys))

## Installation

```bash
composer require sashalenz/nova-poshta-api
```

The service provider registers itself via Laravel's package discovery — no manual wiring needed.

Publish the config file (optional, only needed if you want to override the API URL or pin a default API key in source):

```bash
php artisan vendor:publish --tag="nova-poshta-api-config"
```

## Configuration

```env
NOVA_POSHTA_API_KEY=your-default-api-key
NOVA_POSHTA_API_URL=https://api.novaposhta.ua/v2.0/json/   # optional, this is the default
```

The default API key is used whenever you call a model with `::make()` and no argument. Pass an explicit key (`::make($apiKey)`) when you need to talk to a specific counterparty's account — useful in multi-sender systems where every sender has their own NP cabinet.

```php
use Sashalenz\NovaPoshtaApi\ApiModels\Address;

// Uses NOVA_POSHTA_API_KEY from env
$cities = Address::make()->getCities($request);

// Uses a different counterparty's key for this call only
$senderInvoices = InternetDocument::make($sender->np_api_key)->getDocumentList($request);
```

## Quick start

```php
use Sashalenz\NovaPoshtaApi\ApiModels\Address;
use Sashalenz\NovaPoshtaApi\ApiModels\Address\RequestData\GetCitiesRequest;

$cities = Address::make()
    ->cache(60 * 60) // optional: cache the response for 1 hour
    ->getCities(GetCitiesRequest::from([
        'limit' => 20,
        'findByString' => 'Київ',
    ]));

foreach ($cities as $city) {
    echo "{$city->ref}  {$city->description}\n";
}
```

Every method returns either a single `Spatie\LaravelData\Data` object or a `Spatie\LaravelData\DataCollection` — see [`spatie/laravel-data`](https://github.com/spatie/laravel-data) for the available helpers (`->toArray()`, `->toCollection()`, iteration, etc.).

## API Models

The SDK is split into one class per NP API module. Each class is a fluent builder — call `::make($apiKey)` then the method you want; arguments are typed `*Request` data objects.

### `Address` — locations & address book

Lookup of cities, settlements, warehouses, streets, plus CRUD over an address book stored under your counterparty.

| Method | Returns | Purpose |
|---|---|---|
| `getCities(GetCitiesRequest)` | `DataCollection<CityData>` | City lookup by name or ref |
| `getSettlements(GetSettlementsRequest)` | `DataCollection<SettlementData>` | Full settlement directory (cities + villages) |
| `searchSettlements(SearchSettlementsRequest)` | `SearchSettlementData` | Autocomplete-style settlement search |
| `searchSettlementStreets(SearchSettlementStreetsRequest)` | `SettlementStreetData` | Street search inside a settlement |
| `getStreet(GetStreetRequest)` | `DataCollection<StreetData>` | Street lookup |
| `getAreas()` | `DataCollection<AreaData>` | Oblast list |
| `getWarehouses(GetWarehousesRequest)` | `DataCollection<WarehouseData>` | NP branch list (with filters by city, type, etc.) |
| `getWarehouseTypes()` | `DataCollection<WarehouseTypeData>` | Branch types directory |
| `save(AddressRequest)` | `AddressData` | Create an address book entry |
| `update(AddressRequest)` | `AddressData` | Update one |
| `delete(RefRequest)` | `RefData` | Delete one |

```php
use Sashalenz\NovaPoshtaApi\ApiModels\Address;
use Sashalenz\NovaPoshtaApi\ApiModels\Address\RequestData\GetWarehousesRequest;

$warehouses = Address::make()
    ->cache(60 * 60 * 24)
    ->getWarehouses(GetWarehousesRequest::from([
        'cityRef' => $city->ref,
        'limit' => 500,
    ]));
```

### `Common` — reference dictionaries

Read-only directories used when filling out shipment forms — cargo types, payer types, packaging, time intervals. Most are excellent candidates for long-lived caching since they barely change.

| Method | Purpose |
|---|---|
| `getCargoTypes()` | Cargo type list (parcel, documents, cargo, pallets, tires) |
| `getBackwardDeliveryCargoTypes()` | Cargo types valid for return-delivery |
| `getPayersForRedelivery` *(via `getTypesOfPayersForRedelivery()`)* | Who pays the cash-on-delivery fee |
| `getPalletsList()` | Standard pallet sizes |
| `getPackList(GetPackListRequest?)` | Available packaging |
| `getTiresWheelsList()` | Tire/wheel reference list |
| `getOwnershipFormsList()` | Legal ownership forms (LLC, FOP…) |
| `getCargoDescriptionList(GetCargoDescriptionListRequest?)` | Allowed free-text cargo descriptions |
| `getTimeIntervals(GetTimeIntervalsRequest)` | Time slots for "Доставка у точно визначений час" |
| `getMessageCodeText()` | NP API message code dictionary |

### `Counterparty` — senders, recipients, third parties

Manages counterparties (юр./фіз. особи) registered to your account — anyone you ship from or to.

| Method | Purpose |
|---|---|
| `getCounterparties(GetCounterpartiesRequest)` | List your counterparties (Sender / Recipient / ThirdPerson) |
| `getCatalogCounterparty(GetCatalogCounterpartyRequest)` | Search the public NP catalog by EDRPOU/name |
| `getCounterpartyOptions(RefRequest)` | Allowed shipment options for a counterparty |
| `getCounterpartyAddresses(GetCounterpartyAddressesRequest)` | Addresses bound to a counterparty |
| `getCounterpartyContactPersons(RefRequest)` | Contact persons under a counterparty |
| `save(SaveCounterpartyRequest)` | Create a counterparty |
| `update(UpdateCounterpartyRequest)` | Update one |
| `delete(RefRequest)` | Delete one |

### `ContactPerson` — counterparty contacts

CRUD for contact persons under a counterparty (e.g. a department lead inside a Sender LLC).

| Method | Purpose |
|---|---|
| `save(SaveContactPersonRequest)` | Create |
| `update(UpdateContactPersonRequest)` | Update |
| `delete(RefRequest)` | Delete |

### `InternetDocument` — express waybills (TTN)

The bread and butter — create and manage shipments.

| Method | Purpose |
|---|---|
| `getDocumentPrice(GetDocumentPriceRequest)` | Price estimate before creating a TTN |
| `getDocumentDeliveryDate(GetDocumentDeliveryDateRequest)` | ETA estimate before creating a TTN |
| `save(SaveInternetDocumentRequest)` | Issue a new TTN |
| `update(UpdateInternetDocumentRequest)` | Update an existing TTN (only while it's not yet at NP's hands) |
| `delete(DeleteInternetDocumentRequest)` | Cancel a TTN |
| `getDocument(RefRequest)` | Fetch one document by ref |
| `getDocumentList(GetDocumentListRequest)` | List your documents (by date range, status, etc.) |

```php
use Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument;
use Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\RequestData\GetDocumentPriceRequest;
use Sashalenz\NovaPoshtaApi\Enums\CargoType;
use Sashalenz\NovaPoshtaApi\Enums\ServiceType;

$price = InternetDocument::make($sender->api_key)->getDocumentPrice(
    GetDocumentPriceRequest::from([
        'citySender' => $sender->city_ref,
        'cityRecipient' => $recipientCityRef,
        'weight' => 5.5,
        'serviceType' => ServiceType::WAREHOUSE_WAREHOUSE,
        'cargoType' => CargoType::CARGO,
        'cost' => 1000,
        'seatsAmount' => 1,
    ])
);

echo $price->cost; // UAH
```

### `ScanSheet` — registries

Bundles TTNs into a daily registry for the courier hand-off.

| Method | Purpose |
|---|---|
| `getScanSheetList()` | List your registries |
| `getScanSheet(GetScanSheetRequest)` | Detail of a single registry |
| `insertDocuments(InsertDocumentsRequest)` | Add TTNs to a registry |
| `removeDocuments(RemoveDocumentsRequest)` | Remove TTNs from a registry |
| `deleteScanSheet(DeleteScanSheetData)` | Delete an empty registry |

### `TrackingDocument` — status polling

```php
use Sashalenz\NovaPoshtaApi\ApiModels\TrackingDocument\TrackingDocument;
use Sashalenz\NovaPoshtaApi\ApiModels\TrackingDocument\RequestData\GetStatusDocumentsRequest;
use Sashalenz\NovaPoshtaApi\ApiModels\TrackingDocument\RequestData\DocumentData;

$statuses = TrackingDocument::make()->getStatusDocuments(
    GetStatusDocumentsRequest::from([
        'documents' => [
            DocumentData::from(['documentNumber' => '20400000000001', 'phone' => '380501234567']),
            DocumentData::from(['documentNumber' => '20400000000002', 'phone' => '380501234567']),
        ],
    ])
);

foreach ($statuses as $status) {
    echo "{$status->number}: {$status->status} (statusCode={$status->statusCode})\n";
}
```

`statusCode` follows NP's published numeric status table — see [NP docs](https://developers.novaposhta.ua/view/model/a99d2f28-7c30-11ec-8ced-005056b2dbe1/method/a9956c79-7c30-11ec-8ced-005056b2dbe1) for the full list.

### `AdditionalService` — returns, redirects, EW changes

Operations on TTNs that already left your hands.

| Method | Purpose |
|---|---|
| `checkPossibilityCreateReturn(CheckPossibilityCreateReturnRequest)` | Can this TTN be returned, and to where |
| `checkPossibilityForRedirecting(...)` | Can this TTN be redirected |
| `checkPossibilityChangeEW(CheckPossibilityChangeEWRequest)` | Can this TTN be edited |
| `getReturnReasons()` | Pickable return reasons |
| `getReturnReasonsSubtypes(GetReturnReasonsSubtypesRequest)` | Reason subtypes for a given reason |
| `save(SaveAdditionalServiceRequest)` | Create a return / redirect / EW-change order |
| `delete(RefRequest)` | Cancel one |
| `getReturnOrdersList(GetOrdersListRequest?)` | Your existing return orders |
| `getRedirectionOrdersList(GetOrdersListRequest?)` | Your existing redirect orders |
| `getChangeEWOrdersList(GetOrdersListRequest?)` | Your existing change-EW orders |

`save()` returns `AdditionalServiceSaveData{ number, ref }` — `number` is the new return / redirect TTN, persist it to track the chain.

## Caching

Any model can cache its response by chaining `->cache($seconds)` before the method call. Use `-1` (the default when no argument is passed) to cache forever.

```php
// Cache cities for 24h — the directory rarely changes
Address::make()->cache(60 * 60 * 24)->getCities($request);

// Cache forever (until you flush manually)
Common::make()->cache()->getCargoTypes();
```

The cache key is composed of the model name, the called method and a base64-serialized hash of the request payload, so different inputs to the same method get different cache slots.

## Enums

| Enum | Use |
|---|---|
| `CargoType` | Cargo type for `InternetDocument::save` (`CARGO`, `DOCUMENTS`, `PARCEL`, `TIRES_WHEELS`, `PALLET`) |
| `ServiceType` | Pickup/delivery model (`WAREHOUSE_WAREHOUSE`, `WAREHOUSE_DOORS`, `DOORS_WAREHOUSE`, `DOORS_DOORS`) |
| `PayerType` | Who pays (`SENDER`, `RECIPIENT`, `THIRD_PERSON`) |
| `PaymentMethod` | `CASH` or `NON_CASH` |
| `OrderType` | `AdditionalService` order type — `ORDER_CARGO_RETURN`, `ORDER_REDIRECTING`, `ORDER_CHANGE_EW` |
| `CounterpartyType` | `SENDER`, `RECIPIENT`, `THIRD_PERSON` |
| `CounterpartyProperty` | `PRIVATE_PERSON` or `ORGANIZATION` |

## Marking — print URLs

`Sashalenz\NovaPoshtaApi\Marking` builds public NP cabinet URLs for label / scan-sheet PDFs. They're plain `https://my.novaposhta.ua/...` links you can hand to the browser or pipe into a PDF printer — no JSON API call involved.

```php
use Sashalenz\NovaPoshtaApi\Marking;

// 85x85 label, HTML or pdf8
$labelUrl = Marking::printMarking('pdf8', ['20400000000001'], $apiKey);

// 100x100 zebra-printer label
$zebraUrl = Marking::printZebraMarking('pdf', ['20400000000001'], $apiKey);

// Scan sheet (registry) PDF
$sheetUrl = Marking::printScanSheet($scanSheetRef, $apiKey);

// Combined documents print
$docsUrl = Marking::printDocument(['ref-1', 'ref-2'], 'pdf', $apiKey);
```

`printMarking()` and `printDocument()` return `null` if you pass an unsupported `$type` — only `'html'` and `'pdf'`/`'pdf8'` are accepted.

## Error handling

Every request goes through `Request::make()`, which raises one of two exception types — both extending `NovaPoshtaException`:

| Exception | When | Typical use |
|---|---|---|
| `NovaPoshtaApiUnavailableException` | NP itself is unreachable: cURL connection reset, DNS failure, timeout, or any 5xx response | Treat as a transient infrastructure issue — retry later, render an empty/cached fallback, alert the on-call channel separately from code errors |
| `NovaPoshtaException` | NP returned an HTTP 4xx, or a 200 response whose body contained an `errors[]` array / `success: false` | Application-level error — the request itself is the problem (bad TTN, missing API key, malformed payload). Surface to the user / log and move on |

Existing `catch (NovaPoshtaException)` sites pick up the unavailable subclass automatically, so legacy code keeps working. Catch the subclass first when you need to react differently to downtime:

```php
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaApiUnavailableException;
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;

try {
    $cities = Address::make()->getCities($request);
} catch (NovaPoshtaApiUnavailableException $e) {
    // NP is down — fall back to cached results, suppress UI noise
    return $cachedCities;
} catch (NovaPoshtaException $e) {
    // Something is wrong with our request — log and surface to the user
    report($e);
    return collect();
}
```

For Bugsnag / Sentry, route `NovaPoshtaApiUnavailableException` to a lower severity (e.g. `warning`) so the dashboard isn't flooded during NP's evening flapping windows:

```php
// bootstrap/app.php — Laravel 11+
->withExceptions(fn (Exceptions $exceptions) => $exceptions
    ->report(function (NovaPoshtaApiUnavailableException $e) {
        Bugsnag::notifyException($e, fn ($report) => $report->setSeverity('warning'));
        return false; // skip default reporting
    })
    ->dontReport([NovaPoshtaException::class])
)
```

The HTTP layer also auto-retries 3 times with a 100ms backoff and a 3s per-attempt timeout before giving up — so by the time an exception leaves the SDK, NP really wasn't reachable.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Oleksandr Petrovskyi](https://github.com/sashalenz)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
