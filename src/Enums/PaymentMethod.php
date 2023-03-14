<?php

namespace Sashalenz\NovaPoshtaApi\Enums;

enum PaymentMethod: string
{
    case CASH = 'Cash';
    case NON_CASH = 'NonCash';
}
