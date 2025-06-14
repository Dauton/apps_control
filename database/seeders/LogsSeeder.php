<?php

namespace Database\Seeders;

use App\Models\Logs;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = 'Login';
        $result = 'Sucesso';
        $description = 'Logado com sucesso.';
        $by = session("user.username");
        $created_at = now();

        Logs::create([
            'type' => Str::upper(trim($type)),
            'description' => Str::upper(trim($description)),
            'result' => Str::upper(trim($result)),
            'by' => Str::upper(trim($by)),
            'created_at' => $created_at
        ]);
    }
}
