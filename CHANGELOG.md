# Changelog

All notable changes to `nova-poshta-api` will be documented in this file.

## Unreleased

### Added

- `NovaPoshtaApiUnavailableException` — a `NovaPoshtaException` subclass thrown by `Request::make()` when NP itself is unreachable (cURL connection reset / DNS failure / timeout / 5xx). Lets callers and error trackers group "NP is down" separately from application-level errors returned in the API payload.

### Changed

- `Request::make()` now catches `Illuminate\Http\Client\ConnectionException` (previously leaked out as an unhandled exception, crashing callers mid-render on transient NP outages). Connection-level failures and 5xx responses are surfaced as `NovaPoshtaApiUnavailableException`; 4xx responses and application errors keep the legacy `NovaPoshtaException` so existing `catch (NovaPoshtaException)` sites continue to work.

### Fixed

- `DocumentPriceData::costRedelivery` and `assessedCost` now default to `0.0`. NP API omits these fields when the corresponding value is zero (no redelivery configured / no assessed cargo value declared), which previously caused `Spatie\LaravelData\Exceptions\CannotCreateData` on `getDocumentPrice()`.
