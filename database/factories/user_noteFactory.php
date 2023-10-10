<?php

namespace Database\Factories;

use App\Models\quiz;
use App\Models\Interne_user;
use App\Models\Externe_user;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class user_noteFactory extends Factory
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
                return Interne_user::inRandomOrder()->first()->id;
            },
            'externe_user_id' =>    function (){
                return Externe_user::inRandomOrder()->first()->id;
            },
            'quiz_id' =>    function (){
                return quiz::inRandomOrder()->first()->id;
            },
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
}
