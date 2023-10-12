<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class questionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->numberBetween(36),
            'text' => $this->faker->sentence(10),
            'image' => $this->faker->sentence(1),
            'quiz_id' =>    function (){
                return Quiz::inRandomOrder()->first()->id;
            },
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
}
