<?php

namespace App\Enums;

enum VehicleMaintenanceScheduleStatusEnum: string
{
    case Pending = 'pending';
    case Completed = 'completed';
    case Skipped = 'skipped';
}
