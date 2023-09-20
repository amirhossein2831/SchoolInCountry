<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->country(),
            'capital' => fake()->city(),
            'currency_name' => fake()->randomElement([
                'United States Dollar',
                'Euro',
                'British Pound Sterling',
                'Japanese Yen',
                'Swiss Franc',
                'Canadian Dollar',
                'Australian Dollar',
                'Chinese Yuan',
                'Indian Rupee',
                'South African Rand',
                'Brazilian Real',
                'Mexican Peso',
                'Russian Ruble',
                'Singapore Dollar',
                'New Zealand Dollar',
                'Rial'
            ]),
            'language' => fake()->randomElement([
                'Persian',
                'English',
                'Spanish',
                'French',
                'German',
                'Chinese (Simplified)',
                'Japanese',
                'Arabic',
                'Russian',
                'Portuguese',
                'Hindi',
                'Bengali',
                'Swahili',
                'Korean',
                'Italian',
                'Dutch',
            ]),
            'continent_id' => fake()->numberBetween(1, 7),
        ];
    }
}
