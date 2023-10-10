<?php

namespace Database\Factories;

use App\Models\Ratings;
use App\Models\StepSection;
use App\Models\Step_Sections;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assessment>
 */
class AssessmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'note' => random_int(1, 5),
            'step_section_id' => random_int(1, StepSection::all()->count())
        ];
    }
}
