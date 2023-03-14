<?php

namespace Sashalenz\NovaPoshtaApi\Enums;

enum CounterpartyProperty: string
{
    case SENDER = 'Sender';
    case RECIPIENT = 'Recipient';
    case THIRD_PERSON = 'ThirdPerson';
}
