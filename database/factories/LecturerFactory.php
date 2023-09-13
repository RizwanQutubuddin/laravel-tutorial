<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LecturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->unique()->name,
            'email'=>fake()->unique()->email,
            'age'=>$this->faker->numberBetween(20,40),
            'city'=>$this->faker->numberBetween(1,3),
        ];

    }
}
