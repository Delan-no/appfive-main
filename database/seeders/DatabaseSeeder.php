<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\InterneUsersRole;
use App\Models\PossibleAnswer;
use App\Models\questions;
use App\Models\Quiz;
use App\Models\Interne_user;
use App\Models\ExterneUser;
use App\Models\Role;
use App\Models\Session;
use App\Models\UserAnswer;
use App\Models\UserNote;
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
        Applicant::factory(10)->create();
        TestStep::factory(4)->create();
        Folder::factory(10)->create();
        InterneUser::factory()->count(5)->create();
        Role::factory()->count(5)->create();
        InterneUsersRole::factory()->count(5)->create();
        TestStep::factory()->count(5)->create();
        StepSection::factory(8)->create();
        Assessment::factory(10)->create();
        Session::factory()->count(5)->create();
        Rating::factory(10)->create();
        ExterneUser::factory()->count(5)->create();
        Quiz::factory(5)->create();
        questions::factory(100)->create();
        PossibleAnswer::factory(10)->create();
        UserAnswer::factory(10)->create();
        UserNote::factory(10)->create();
    }
}