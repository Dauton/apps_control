<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $name = 'Dauton Pereira Félix';
        $username = 'dpfelix';
        $password = 'd3v3l0p3r';

        User::create([
            'name' => trim($name),
            'username' => trim($username),
            'password' => trim(password_hash($password, PASSWORD_ARGON2ID)),
            'created_at' => now()
        ]);
    }
}
