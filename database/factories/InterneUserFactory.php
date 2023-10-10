<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class InterneUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'login' => $this->faker->email(),
            'password' => 'password',
        ];
    }
}
