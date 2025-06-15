<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $name = 'DEVELOPER';
        $username = 'DEV';
        $password = 'd3v3l0p3r';
        $created_by = 'SEEDER';
        $created_at = now();

        User::create([
            'name' => trim(Str::upper($name)),
            'username' => trim(Str::upper($username)),
            'password' => trim(password_hash($password, PASSWORD_ARGON2ID)),
            'created_by' => trim(Str::upper($created_by)),
            'created_at' => $created_at
        ]);
    }
}
