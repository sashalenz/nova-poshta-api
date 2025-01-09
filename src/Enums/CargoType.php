<?php

namespace Sashalenz\NovaPoshtaApi\Enums;

enum CargoType: string
{
    case CARGO = 'Cargo';
    case DOCUMENTS = 'Documents';
    case TIRESWHEELS = 'TiresWheels';
    case TIRES_WHEELS = 'Tires_wheels';
    case PALLET = 'Pallet';
    case PARCEL = 'Parcel';
    case MONEY = 'Money';
    case SIGNED_DOCUMENTS = 'SignedDocuments';
    case TRAYS = 'Trays';
}
