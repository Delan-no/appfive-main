<?php

namespace Database\Factories;

use App\Models\Admins;
use App\Models\Assessment;
use App\Models\Folder;
use App\Models\Folders;
use App\Models\InterneUser;
use App\Models\TestStep;
use App\Models\test_steps;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $folderIds = Folder::all()->pluck('id')->toArray();
        $stepIds = TestStep::pluck('id')->toArray();
        $InterneUserIds = InterneUser::all()->pluck('id')->toArray();
        $Assessment = Assessment::pluck('id')->toArray();
        return [
            //
            'status' => random_int(1, 4),
            'step_grade' => random_int(10, 20),
            'date_time_rate' =>$this->faker->dateTime(),
            'folder_id' => $folderIds[array_rand($folderIds)],
            'interne_user_id' => $InterneUserIds[array_rand($InterneUserIds)],
            'assessment_id' => $Assessment[array_rand($Assessment)],
            'test_step_id' => $stepIds[array_rand($stepIds)],
        ];
    }
}
