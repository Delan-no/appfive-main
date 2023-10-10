<?php

namespace Database\Factories;

use App\Models\possible_answer;
use App\Models\questions;
use App\Models\quiz;
use App\Models\User;
use App\Models\Interne_user;
use App\Models\Externe_user;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class user_answerFactory extends Factory
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
            'interne_user_id' =>    function (){
                return Interne_user::inRandomOrder()->first()->id;
            },
            'externe_user_id' =>    function (){
                return Externe_user::inRandomOrder()->first()->id;
            },
            'quiz_id' =>    function (){
                return quiz::inRandomOrder()->first()->id;
            },
            'possible_answer_id' =>    function (){
                return possible_answer::inRandomOrder()->first()->id;
            },
            'question_id' =>    function (){
                return questions::inRandomOrder()->first()->id;
            },
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
}
