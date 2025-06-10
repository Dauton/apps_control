<?php

namespace Database\Seeders;

use App\Models\Server;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name_server = '200';
        $ip_server = '10.10.10.200';
        $php_version_server = '8.4';
        $laravel_version_server = '12';
        $created_by = "Dauton Pereira Félix"; // session('user.name')
        $created_at = now();

        Server::create([
            'name_server' => trim(Str::upper($name_server)),
            'ip_server' => trim($ip_server),
            'php_version_server' => trim($php_version_server),
            'laravel_version_server' => trim($laravel_version_server),
            'created_by' => trim(Str::upper($created_by)),
            'created_at' => $created_at
        ]);
    }
}
