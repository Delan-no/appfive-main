<?php

namespace Database\Factories;

use App\Models\Applicant;
use App\Models\Applicants;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Folder>
 */
class FolderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $degrees = ["BAC + 2", "Licence", "Master", "Doctorat"];
        $currentStatus = ["Etudiant", "Sans activité professionnelle", "Salarié", "Entrepreneur"];
        $englishLevel = ["Débutant", "Intermédiaire", "Courant", "Bilingue"];
        $university = ["Université de Parakou", "Université d'Abomey-Calavi"];
        $applicantId = Applicant::all()->pluck('id')->toArray();
        return [
            //
            'applicant_id' => $this->faker->randomElement($applicantId),
            'study_level' => $degrees[array_rand($degrees)],
            'year_graduated' => $this->faker->dateTimeBetween('-30 years', '-4 years'),
            'university' => $university[array_rand($university)],
            'graduated_field' => $degrees[array_rand($degrees)],
            'actual_situation' => $currentStatus[array_rand($currentStatus)],
            'english_level' => $englishLevel[array_rand($englishLevel)],
            'why_us' => $this->faker->paragraph(),
            'your_expectations' => $this->faker->paragraph(),
            'just_imagin' => $this->faker->paragraph(),
            'your_futur' => $this->faker->paragraph(),
            'know_us' => $this->faker->sentence(),
        ];
    }
}
