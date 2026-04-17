<?php

namespace App\Models;

use App\Enums\VehicleExpenseScheduleFrequencyTypeEnum;
use App\Enums\VehicleExpenseScheduleStatusEnum;
use Database\Factories\VehicleExpenseScheduleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehicleExpenseSchedule extends Model
{
    /** @use HasFactory<VehicleExpenseScheduleFactory> */
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'category_id',
        'amount',
        'description',
        'start_date',
        'end_date',
        'status',
        'frequency_type',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'status' => VehicleExpenseScheduleStatusEnum::class,
        'frequency_type' => VehicleExpenseScheduleFrequencyTypeEnum::class,
    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
