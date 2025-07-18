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
        $by = 'SEEDER'; // session('user.username')
        $origin_ip = request()->ip();
        $created_at = now();

        Logs::create([
            'type' => Str::upper(trim($type)),
            'description' => Str::upper(trim($description)),
            'result' => Str::upper(trim($result)),
            'by' => Str::upper(trim($by)),
            'origin_ip' => trim($origin_ip),
            'created_at' => $created_at
        ]);
    }
}
