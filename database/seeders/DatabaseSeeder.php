<?php

namespace Database\Seeders;

use App\Models\PreviousExperience;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        PreviousExperience::factory()
            ->count(83)
            ->create();
    }
}
