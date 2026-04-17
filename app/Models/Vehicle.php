<?php

namespace App\Models;

use App\Enums\VehicleStatusEnum;
use Database\Factories\VehicleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    /** @use HasFactory<VehicleFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'serial_number',
        'license_plate',
        'model',
        'manufacturer',
        'year',
        'color',
        'status',
    ];

    protected $casts = [
        'year' => 'integer',
        'status' => VehicleStatusEnum::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function incomes(): HasMany
    {
        return $this->hasMany(VehicleIncome::class);
    }

    public function maintenanceTypes(): HasMany
    {
        return $this->hasMany(VehicleMaintenanceType::class);
    }

    public function odometerLogs(): HasMany
    {
        return $this->hasMany(VehicleOdometerLog::class);
    }

    public function maintenances(): HasMany
    {
        return $this->hasMany(VehicleMaintenance::class);
    }

    public function expenses(): HasMany
    {
        return $this->hasMany(VehicleExpense::class);
    }

    public function income_schedules(): HasMany
    {
        return $this->hasMany(VehicleIncomeSchedule::class);
    }

    public function components(): HasMany
    {
        return $this->hasMany(VehicleComponent::class);
    }

    public function maintenance_schedules(): HasMany
    {
        return $this->hasMany(VehicleMaintenanceSchedule::class, 'vehicle_id');
    }

    public function expense_schedules(): HasMany
    {
        return $this->hasMany(VehicleExpenseSchedule::class, 'vehicle_id');
    }
}
