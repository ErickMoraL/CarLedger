<?php

namespace App\Enums;

enum VehicleExpenseScheduleFrequencyTypeEnum: string
{
    case Daily = 'daily';
    case Weekly = 'weekly';
    case Monthly = 'monthly';
    case Unique = 'unique';
}
