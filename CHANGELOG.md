# Changelog

All notable changes to `nova-poshta-api` will be documented in this file.

## Unreleased

### Added

- `NovaPoshtaApiUnavailableException` — a `NovaPoshtaException` subclass thrown by `Request::make()` when NP itself is unreachable (cURL connection reset / DNS failure / timeout / 5xx). Lets callers and error trackers group "NP is down" separately from application-level errors returned in the API payload.

### Changed

- `Request::make()` now catches `Illuminate\Http\Client\ConnectionException` (previously leaked out as an unhandled exception, crashing callers mid-render on transient NP outages). Connection-level failures and 5xx responses are surfaced as `NovaPoshtaApiUnavailableException`; 4xx responses and application errors keep the legacy `NovaPoshtaException` so existing `catch (NovaPoshtaException)` sites continue to work.

### Fixed

- `DocumentPriceData::costRedelivery` and `assessedCost` now default to `0.0`. NP API omits these fields when the corresponding value is zero (no redelivery configured / no assessed cargo value declared), which previously caused `Spatie\LaravelData\Exceptions\CannotCreateData` on `getDocumentPrice()`.

### Documentation

- README rewritten end-to-end. Replaced the placeholder skeleton with full coverage:
  - Requirements, installation, configuration (both `NOVA_POSHTA_API_KEY` and `NOVA_POSHTA_API_URL` env vars).
  - Per-counterparty API key usage (`::make($apiKey)` override) for multi-sender setups.
  - Quick-start example.
  - One section per `ApiModels\*` module (`Address`, `Common`, `Counterparty`, `ContactPerson`, `InternetDocument`, `ScanSheet`, `TrackingDocument`, `AdditionalService`) — each with a method table and a runnable example where it adds value.
  - `->cache($seconds)` chaining, with a note on cache-key composition.
  - Enum cheat-sheet (`CargoType`, `ServiceType`, `PayerType`, `PaymentMethod`, `OrderType`, `CounterpartyType`, `CounterpartyProperty`).
  - `Marking` static helpers — label / zebra / scan-sheet / document print URLs.
  - Error-handling guide with the new `NovaPoshtaApiUnavailableException`, including a Bugsnag severity-routing snippet for `bootstrap/app.php`.
