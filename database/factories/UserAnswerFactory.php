<?php

namespace Database\Factories;

use App\Models\PossibleAnswer;
use App\Models\Questions;
use App\Models\Quiz;
use App\Models\User;
use App\Models\InterneUser;
use App\Models\ExterneUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserAnswerFactory extends Factory
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
                return InterneUser::inRandomOrder()->first()->id;
            },
            'externe_user_id' =>    function (){
                return ExterneUser::inRandomOrder()->first()->id;
            },
            'quiz_id' =>    function (){
                return Quiz::inRandomOrder()->first()->id;
            },
            'possible_answer_id' =>    function (){
                return PossibleAnswer::inRandomOrder()->first()->id;
            },
            'question_id' =>    function (){
                return Questions::inRandomOrder()->first()->id;
            },
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
}
