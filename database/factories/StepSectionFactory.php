<?php

namespace Database\Factories;

use App\Models\StepSection;
use App\Models\TestStep;
use App\Models\test_steps;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StepSection>
 */
class StepSectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $testStepIds = TestStep::all()->pluck('id')->toArray();
        return [
            //
            'section_name' => $this->faker->word(),
            'test_step_id' => $testStepIds[array_rand($testStepIds)]
        ];
    }
}
