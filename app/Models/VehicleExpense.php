<?php

namespace App\Models;

use Database\Factories\VehicleExpenseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehicleExpense extends Model
{
    /** @use HasFactory<VehicleExpenseFactory> */
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'amount',
        'expense_date',
        'category',
        'description',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'expense_date' => 'date',
    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }
}
