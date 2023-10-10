<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class TestStepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $stepName = ['Etude de dossier', 'Test psychotechnique', 'Test collectif', 'Test individuel'];
        return [
            'test_step_name' => $stepName[array_rand($stepName)]
        ];
    }
}
