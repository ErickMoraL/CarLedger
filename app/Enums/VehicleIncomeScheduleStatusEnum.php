<?php

namespace App\Enums;

enum VehicleIncomeScheduleStatusEnum: string
{
    case Active = 'active';
    case Paused = 'paused';
    case Completed = 'completed';
}
