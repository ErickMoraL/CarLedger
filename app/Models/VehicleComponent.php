<?php

namespace App\Models;

use Database\Factories\VehicleComponentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VehicleComponent extends Model
{
    /** @use HasFactory<VehicleComponentFactory> */
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'category_id',
        'name',
        'installed_date',
        'installed_odometer_log_id',
        'removed_date',
        'removed_odometer_log_id',
        'notes',
    ];

    protected $casts = [
        'installed_date' => 'date',
        'removed_date' => 'date',
    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function installedOdometerLog(): BelongsTo
    {
        return $this->belongsTo(VehicleOdometerLog::class, 'installed_odometer_log_id');
    }

    public function removedOdometerLog(): BelongsTo
    {
        return $this->belongsTo(VehicleOdometerLog::class, 'removed_odometer_log_id');
    }

    public function maintenances(): BelongsToMany
    {
        return $this->belongsToMany(VehicleMaintenance::class, 'vehicle_maintenance_components')
            ->withTimestamps();
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(VehicleMaintenanceSchedule::class, 'vehicle_component_id');
    }
}
