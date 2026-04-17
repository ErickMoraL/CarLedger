<?php

namespace App\Enums;

enum VehicleMaintenanceIntervalTypeEnum: string
{
    case KM = 'km';
    case DAYS = 'days';
    case MONTHS = 'months';
    case YEARS = 'years';
    case WEEKS = 'weeks';
}
