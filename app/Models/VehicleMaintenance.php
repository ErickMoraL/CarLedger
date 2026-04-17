<?php

namespace App\Models;

use Database\Factories\VehicleMaintenanceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VehicleMaintenance extends Model
{
    /** @use HasFactory<VehicleMaintenanceFactory> */
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'vehicle_maintenance_type_id',
        'service_date',
        'odometer_log_id',
        'cost',
        'description',
        'notes',
    ];

    protected $casts = [
        'service_date' => 'date',
        'cost' => 'decimal:2',
    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function maintenanceType(): BelongsTo
    {
        return $this->belongsTo(VehicleMaintenanceType::class, 'vehicle_maintenance_type_id');
    }

    public function odometerLog(): BelongsTo
    {
        return $this->belongsTo(VehicleOdometerLog::class, 'odometer_log_id');
    }

    public function components(): BelongsToMany
    {
        return $this->belongsToMany(VehicleComponent::class, 'vehicle_maintenance_components')
            ->withTimestamps();
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(VehicleMaintenanceSchedule::class, 'vehicle_maintenance_id');
    }
}
