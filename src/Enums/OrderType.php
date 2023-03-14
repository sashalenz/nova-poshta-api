<?php

namespace Sashalenz\NovaPoshtaApi\Enums;

enum OrderType: string
{
    case ORDER_CARGO_RETURN = 'orderCargoReturn';
    case ORDER_REDIRECTING = 'orderRedirecting';
    case ORDER_CHANGE_EW = 'orderChangeEW';
}
