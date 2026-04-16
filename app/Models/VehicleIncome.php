<?php

namespace App\Models;

use Database\Factories\VehicleIncomeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehicleIncome extends Model
{
    /** @use HasFactory<VehicleIncomeFactory> */
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'amount',
        'received_date',
        'period_start',
        'period_end',
        'notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'received_date' => 'date',
        'period_start' => 'date',
        'period_end' => 'date',
    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }
}
