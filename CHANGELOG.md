# Changelog

All notable changes to `nova-poshta-api` will be documented in this file.

## Unreleased

### Fixed

- `DocumentPriceData::costRedelivery` and `assessedCost` now default to `0.0`. NP API omits these fields when the corresponding value is zero (no redelivery configured / no assessed cargo value declared), which previously caused `Spatie\LaravelData\Exceptions\CannotCreateData` on `getDocumentPrice()`.
