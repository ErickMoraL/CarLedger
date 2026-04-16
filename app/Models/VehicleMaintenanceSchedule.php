<?php

namespace App\Models;

use Database\Factories\VehicleMaintenanceScheduleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehicleMaintenanceSchedule extends Model
{
    /** @use HasFactory<VehicleMaintenanceScheduleFactory> */
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'vehicle_maintenance_type_id',
        'vehicle_component_id',
        'vehicle_maintenance_id',
        'expected_date',
        'expected_kilometers',
        'status',
        'notes',
    ];

    protected $casts = [
        'expected_date' => 'date',
        'expected_kilometers' => 'integer',
    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function maintenanceType(): BelongsTo
    {
        return $this->belongsTo(VehicleMaintenanceType::class, 'vehicle_maintenance_type_id');
    }

    public function component(): BelongsTo
    {
        return $this->belongsTo(VehicleComponent::class, 'vehicle_component_id');
    }

    public function maintenance(): BelongsTo
    {
        return $this->belongsTo(VehicleMaintenance::class, 'vehicle_maintenance_id');
    }
}
