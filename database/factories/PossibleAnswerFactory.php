<?php

namespace Database\Factories;

use App\Models\questions;
use App\Models\quiz;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PossibleAnswerFactory extends Factory
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
            'text' => $this->faker->sentence(15),
            'state' => $this->faker->boolean(),
            'quiz_id' =>    function (){
                return quiz::inRandomOrder()->first()->id;;
            },
            'question_id' =>    function (){
                return questions::inRandomOrder()->first()->id;;
            },
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
}
