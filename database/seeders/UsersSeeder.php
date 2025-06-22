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

        $name = 'Dauton Félix';
        $username = 'dpfelix';
        $password = '@Daltasso5813';
        $theme_preference = 'LIGHT'; // or DARK
        $created_by = 'SEEDER';
        $created_at = now();

        User::create([
            'name' => trim(Str::upper($name)),
            'username' => trim(Str::upper($username)),
            'password' => password_hash(trim($password), PASSWORD_ARGON2ID),
            'theme_preference' => trim(Str::upper($theme_preference)),
            'created_by' => trim(Str::upper($created_by)),
            'created_at' => $created_at
        ]);
    }
}
