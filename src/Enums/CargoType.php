<?php

namespace Sashalenz\NovaPoshtaApi\Enums;

enum CargoType: string
{
    case CARGO = 'Cargo';
    case DOCUMENTS = 'Documents';
    case TIRES_WHEELS = 'TiresWheels';
    case PALLET = 'Pallet';
    case PARCEL = 'Parcel';
    case MONEY = 'Money';
    case SIGNED_DOCUMENTS = 'SignedDocuments';
    case TRAYS = 'Trays';
}
