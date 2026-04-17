<?php

namespace App\Enums;

enum VehicleIncomeScheduleFrequencyTypeEnum: string
{
    case Daily = 'daily';
    case Weekly = 'weekly';
    case Monthly = 'monthly';
    case Yearly = 'yearly';
}
