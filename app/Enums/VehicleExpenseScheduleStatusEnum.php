<?php

namespace App\Enums;

enum VehicleExpenseScheduleStatusEnum: string
{
    case Active = 'active';
    case Paused = 'paused';
    case Completed = 'completed';
}
