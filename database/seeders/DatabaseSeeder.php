<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\InterneUsersRole;
use App\Models\possible_answer;
use App\Models\questions;
use App\Models\quiz;
use App\Models\Interne_user;
use App\Models\Externe_user;
use App\Models\Role;
use App\Models\Session;
use App\Models\user_answer;
use App\Models\user_note;
use Illuminate\Database\Seeder;
use App\Models\Applicant;
use App\Models\Assessment;
use App\Models\Folder;
use App\Models\InterneUser;
use App\Models\Rating;
use App\Models\StepSection;
use App\Models\TestStep;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Applicant::factory(10)->create();
        // TestStep::factory(4)->create();
        // Folder::factory(10)->create();
        // InterneUser::factory()->count(5)->create();
        // Role::factory()->count(5)->create();
        // InterneUsersRole::factory()->count(5)->create();
        // TestStep::factory()->count(5)->create();
        // StepSection::factory(8)->create();
        // Assessment::factory(10)->create();
        // Session::factory()->count(5)->create();
        // Rating::factory(10)->create();
        // Externe_user::factory()->count(5)->create();
        // quiz::factory(5)->create();
        // questions::factory(10)->create();
        // possible_answer::factory(40)->create();
        // user_answer::factory(10)->create();
        // user_note::factory(10)->create();
    }
}