<?php

namespace App\Models;

use Database\Factories\VehicleOdometerLogFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VehicleOdometerLog extends Model
{
    /** @use HasFactory<VehicleOdometerLogFactory> */
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'log_date',
        'kilometers',
    ];

    protected $casts = [
        'log_date' => 'date',
        'kilometers' => 'integer',
    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function installedComponents(): HasMany
    {
        return $this->hasMany(VehicleComponent::class, 'installed_odometer_log_id');
    }

    public function removedComponents(): HasMany
    {
        return $this->hasMany(VehicleComponent::class, 'removed_odometer_log_id');
    }

    public function maintenances(): HasMany
    {
        return $this->hasMany(VehicleMaintenance::class, 'odometer_log_id');
    }
}
