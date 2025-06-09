<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $nome = 'Dauton Pereira Félix';
        $usuario = 'dpfelix';
        $senha = 'd3v3l0p3r';

        Usuario::create([
            'nome' => trim($nome),
            'usuario' => trim($usuario),
            'senha' => trim(password_hash($senha, PASSWORD_ARGON2ID)),
            'created_at' => now()
        ]);
    }
}
