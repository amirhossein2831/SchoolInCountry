<?php

namespace Database\Factories;

use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<State>
 */
class StateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->state(),
            'capital' => fake()->city(),
            'governor' => fake()->name(),
            'position'=> fake()->randomElement(['south','north','west','east','center']),
            'code' => '0' . fake()->numberBetween(1, 99),
        ];
    }
}
