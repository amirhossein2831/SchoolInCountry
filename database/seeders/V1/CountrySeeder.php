<?php

namespace Database\Seeders\V1;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Country::factory()->count(100)->create();
    }
}
