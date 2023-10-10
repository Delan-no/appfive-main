<?php

namespace Database\Factories;

use App\Models\InterneUser;
use App\Models\TestStep;
use Illuminate\Database\Eloquent\Factories\Factory;

class sessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quota' => random_int(1, 5),
            'session_date' => $this->faker->date(),
            'session_time' => $this->faker->time(),
            'test_step_id' => random_int(1, TestStep::all()->count()),
            'interne_user_id' => random_int(1, InterneUser::all()->count())
        ];
    }
}
