<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\InterneUser;
use App\Models\Externe_user;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class quizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'type' => $this->faker->word(),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(20),
            'duration' => $this->faker->numberBetween(2),
            'visibility' => true,
            'interne_user_id' =>    function (){
                return InterneUser::inRandomOrder()->first()->id;
            },
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
}
