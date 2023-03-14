<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Counterparty\ResponseData;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\StudlyCaseMapper;

#[MapInputName(StudlyCaseMapper::class)]
final class DebtorParam extends Data
{
    public function __construct(
        public string $agreementId,
        public string $paymTermId,
        public string $pastDueDebts,
        public string $blockedStatus,
    ) {
    }
}
