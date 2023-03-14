<?php

namespace Sashalenz\NovaPoshtaApi\ApiModels\InternetDocument\RequestData;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ServicesData extends Data
{
    public function __construct(
        public Optional|bool $attorney,
        public Optional|bool $isTakeAttorney,
        public Optional|bool $waybillNewPostWithStamp,
        public Optional|bool $waybillNewPostWithoutStamp,
        public Optional|bool $waybillStateNumber1WithStamp,
        public Optional|bool $waybillStateNumber1WithoutStamp,
        public Optional|bool $costWaybillWithStamp,
        public Optional|bool $costWaybillWithoutStamp,
        public Optional|bool $internationalWaybill,
        public Optional|bool $orderFrom,
        public Optional|bool $aktPPVWithStamp,
        public Optional|bool $aktPPVWithoutStamp,
        public Optional|string $userActions,
    ) {
    }
}
