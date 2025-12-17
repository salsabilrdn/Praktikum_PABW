<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin JobFinder',
            'email' => 'admin@jobfinder.test',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Pelamar Test',
            'email' => 'pelamar@jobfinder.test',
            'password' => bcrypt('password'),
            'role' => 'pelamar'
        ]);
    }
}
