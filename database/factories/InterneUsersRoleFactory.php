<?php

namespace Database\Factories;

use App\Models\InterneUser;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InterneUsersRole>
 */
class InterneUsersRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'interne_user_id' => random_int(1, InterneUser::all()->count()),
            'role_id' => random_int(1, Role::all()->count())
        ];
    }
}
