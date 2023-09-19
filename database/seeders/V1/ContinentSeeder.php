<?php

namespace Database\Seeders\V1;

use App\Models\Continent;
use Illuminate\Database\Seeder;

class ContinentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $continent = [
            ['name' => 'South America', 'created_at' => now()],
            ['name' => 'North America', 'created_at' => now()],
            ['name' => 'Antarctica', 'created_at' => now()],
            ['name' => 'Australia', 'created_at' => now()],
            ['name' => 'Europe', 'created_at' => now()],
            ['name' => 'Africa', 'created_at' => now()],
            ['name' => 'Asia', 'created_at' => now()],
        ];

        Continent::insert($continent);
    }
}
