<?php

namespace Database\Seeders;

use App\Models\Vehicles;
use Illuminate\Database\Seeder;

class VehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehicles::factory()->count(25)->create();
    }
}
