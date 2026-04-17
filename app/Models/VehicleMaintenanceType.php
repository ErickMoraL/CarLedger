<?php

namespace App\Models;

use App\Enums\VehicleMaintenanceIntervalTypeEnum;
use Database\Factories\VehicleMaintenanceTypeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VehicleMaintenanceType extends Model
{
    /** @use HasFactory<VehicleMaintenanceTypeFactory> */
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'name',
        'description',
        'interval_type',
        'default_interval',
    ];

    protected $casts = [
        'default_interval' => 'integer',
        'interval_type' => VehicleMaintenanceIntervalTypeEnum::class,
    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function maintenances(): HasMany
    {
        return $this->hasMany(VehicleMaintenance::class, 'vehicle_maintenance_type_id');
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(VehicleMaintenanceSchedule::class, 'vehicle_maintenance_type_id');
    }
}
