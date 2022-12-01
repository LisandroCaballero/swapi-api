<?php

namespace Database\Seeders;

use App\Models\Starships;
use Illuminate\Database\Seeder;

class StarshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Starships::factory()->count(1)->create();
    }
}
