<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\Counterparty\ResponseData;

use Spatie\LaravelData\Data;

final class PrintMarkingAllowedTypes extends Data
{
    public function __construct(
        public bool $m70x100,
        public bool $m70x100A4,
        public bool $m85x85A4,
        public bool $m100x100,
        public bool $m100x130,
    ) {
    }
}
