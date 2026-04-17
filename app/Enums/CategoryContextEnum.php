<?php

namespace App\Enums;

enum CategoryContextEnum: string
{
    case VehicleExpense = 'vehicle_expense';
    case VehicleComponent = 'vehicle_component';
    case VehicleExpenseSchedule = 'vehicle_expense_schedule';
}
