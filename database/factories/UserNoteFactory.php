<?php

namespace Database\Factories;

use App\Models\quiz;
use App\Models\InterneUser;
use App\Models\ExterneUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserNoteFactory extends Factory
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
            'note' => $this->faker->randomNumber(2),
            'interne_user_id' =>    function (){
                return InterneUser::inRandomOrder()->first()->id;
            },
            'externe_user_id' =>    function (){
                return ExterneUser::inRandomOrder()->first()->id;
            },
            'quiz_id' =>    function (){
                return Quiz::inRandomOrder()->first()->id;
            },
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
}
