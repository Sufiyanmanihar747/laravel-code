<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' =>$this->faker->phoneNumber,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'course' => $this->faker->randomElement(['engineering', 'business', 'medicine']),
            'year' => $this->faker->randomElement(['1st Year', '2nd Year', '3rd Year','4th Year']),
            'address' => $this->faker->address,

        ];
    }
}
