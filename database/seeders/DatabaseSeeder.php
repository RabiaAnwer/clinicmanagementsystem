<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            PermissionSeeder::class,
            UserDetailSeeder::class,
            RolesPermissionsSeeder::class,
            AppointmentSeeder::class,
            TreatmentTypeSeeder::class,
            TreatmentSeeder::class,
            PaymentSeeder::class,
            InventorySeeder::class,
            ExpenseSeeder::class,
        ]);
    }
}
