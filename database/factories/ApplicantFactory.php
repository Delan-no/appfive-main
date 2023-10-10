<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $civility = ["Monsieur", "Madame", "Mademoiselle","Iel"];
        $city = ["Cotonou", "Porto-Novo", "Parakou", "Calavi", "Djougou", "Natitingou"];
        $documentId = ['CNI', 'CIP', 'Carte LEPI', 'Passeport', 'Carte biométrique'];
        $district = ['JAK Donatin', 'PK6', 'Ganhi', 'Les cocotiers', 'Haie Vive', 'Cadjehoun', 'Fidjrosse', 'CEN-SAD', 'Kouhounou', 'Saint-Michel', 'Alada', 'Albarika', 'Boundarou', 'Camp Adagbe', 'Depot', 'Kpebier', 'Tourou I', 'Tourou II', 'Bakinkoura', 'Kabassira', 'Kadera', 'Madina', 'Oueze', 'Sawararou', 'Sinagourou', 'Titirou', 'Zazira', 'Banikanni', 'Baparape', 'Zongo', 'Guema', 'Wansirou', 'Boro', 'Diguidirou', 'Alafiarou', 'Sonon', 'Guinagourou'];
        return [
            //
            'civility' => $civility[array_rand($civility)],
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'birthday' => $this->faker->date(),
            'nationality' => $this->faker->stateAbbr(),
            'document_type' => $documentId[array_rand($documentId)],
            'document_number' => $this->faker->isbn10(),
            'email' => $this->faker->freeEmail(),
            'adresse' => $this->faker->address(),
            'city' => $city[array_rand($city)],
            'district' => $district[array_rand($district)],
            'phone1' => $this->faker->e164PhoneNumber(),
            'phone2' => $this->faker->e164PhoneNumber(),
            'rule' => random_int(0, 127),
            'consent' => random_int(0, 127)
        ];
    }
}
