<?php

namespace App\Enums;

enum VehicleStatusEnum: string
{
    case STATUS_ACTIVE = 'active';
    case STATUS_INACTIVE = 'inactive';
    case STATUS_SOLD = 'sold';
}
