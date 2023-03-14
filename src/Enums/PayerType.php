<?php

namespace Sashalenz\NovaPoshtaApi\Enums;

enum PayerType: string
{
    case SENDER = 'Sender';
    case RECIPIENT = 'Recipient';
    case THIRD_PERSON = 'ThirdPerson';
}
