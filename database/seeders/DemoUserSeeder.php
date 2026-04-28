<?php

namespace Database\Seeders;

use App\Enums\CategoryContextEnum;
use App\Models\Category;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleComponent;
use App\Models\VehicleExpense;
use App\Models\VehicleExpenseSchedule;
use App\Models\VehicleIncome;
use App\Models\VehicleIncomeSchedule;
use App\Models\VehicleMaintenance;
use App\Models\VehicleMaintenanceSchedule;
use App\Models\VehicleMaintenanceType;
use App\Models\VehicleOdometerLog;
use Illuminate\Database\Seeder;

class DemoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Demo User',
            'email' => 'demo@example.com',
            'password' => bcrypt('password'),
        ]);

        $expenseCategories = Category::factory()
            ->count(10)
            ->for($user)
            ->create([
                'context' => CategoryContextEnum::VehicleExpense,
            ]);

        $componentCategories = Category::factory()
            ->count(10)
            ->for($user)
            ->create([
                'context' => CategoryContextEnum::VehicleComponent,
            ]);

        $expenseScheduleCategories = Category::factory()
            ->count(10)
            ->for($user)
            ->create([
                'context' => CategoryContextEnum::VehicleExpenseSchedule,
            ]);

        $vehicles = Vehicle::factory()
            ->count(5)
            ->for($user)
            ->create();

        $vehicles->each(function ($vehicle) use (
            $expenseCategories,
            $componentCategories,
            $expenseScheduleCategories,
        ) {
            VehicleIncome::factory()
                ->count(20)
                ->for($vehicle)
                ->create();

            VehicleIncomeSchedule::factory()
                ->count(2)
                ->for($vehicle)
                ->create();

            $maintenanceTypes = VehicleMaintenanceType::factory()
                ->count(5)
                ->for($vehicle)
                ->create();

            $odometerLogs = VehicleOdometerLog::factory()
                ->count(10)
                ->for($vehicle)
                ->create();

            VehicleExpense::factory()
                ->count(10)
                ->for($vehicle)
                ->recycle($expenseCategories)
                ->create();

            VehicleExpenseSchedule::factory()
                ->count(3)
                ->for($vehicle)
                ->recycle($expenseScheduleCategories)
                ->create();

            $components = VehicleComponent::factory()
                ->count(10)
                ->for($vehicle)
                ->recycle($componentCategories)
                ->withOdometerLogs()
                ->create();

            $maintenances = VehicleMaintenance::factory()
                ->count(8)
                ->for($vehicle)
                ->recycle($maintenanceTypes)
                ->recycle($odometerLogs)
                ->create();

            $maintenances->each(function ($maintenance) use ($components) {
                $maintenance->components()->attach(
                    $components->random(rand(1, 3))->pluck('id')->toArray()
                );
            });

            VehicleMaintenanceSchedule::factory()
                ->count(5)
                ->for($vehicle)
                ->recycle($maintenanceTypes)
                ->recycle($components)
                ->recycle($maintenances)
                ->create();
        });

    }
}
