<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // Buat 101 User
        \App\Models\User::factory(101)->create();

        // Buat 500 Todo
        \App\Models\Todo::factory(500)->create();
    }
}
