<?php

namespace App\Models;

use App\Enums\VehicleIncomeScheduleFrequencyTypeEnum;
use App\Enums\VehicleIncomeScheduleStatusEnum;
use Database\Factories\VehicleIncomeScheduleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehicleIncomeSchedule extends Model
{
    /** @use HasFactory<VehicleIncomeScheduleFactory> */
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'amount',
        'description',
        'start_date',
        'end_date',
        'status',
        'frequency_type',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
        'status' => VehicleIncomeScheduleStatusEnum::class,
        'frequency_type' => VehicleIncomeScheduleFrequencyTypeEnum::class,
    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }
}
