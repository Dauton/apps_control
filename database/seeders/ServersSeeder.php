<?php

namespace Database\Seeders;

use App\Http\Services\Operations;
use App\Models\Server;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type_server = 'APLICAÇÕES E BANCO DE DADOS'; // or APLICAÇÕES or BANCO DE DADOS.
        $name_server = '200';
        $ip_server = '10.10.10.200';
        $os_server = 'WINDOWS SERVER 2022';
        $php_version_server = '8.3.8';
        $python_version_server = '3.12.7';
        $npm_version_server = '10.8.1';
        $nodejs_version_server = '20.12.2';
        $created_by = "SEEDER"; // session('user.name')
        $created_at = now();

        $php_version_server = Operations::ifNull($php_version_server);
        $python_version_server = Operations::ifNull($python_version_server);
        $npm_version_server = Operations::ifNull($php_version_server);
        $nodejs_version_server = Operations::ifNull($python_version_server);

        Server::create([
            'type_server' => trim(Str::upper($type_server)),
            'name_server' => trim(Str::upper($name_server)),
            'ip_server' => Str::upper(trim($ip_server)),
            'os_server' => Str::upper(trim($os_server)),
            'php_version_server' => trim($php_version_server),
            'python_version_server' => trim($python_version_server),
            'npm_version_server' => trim($npm_version_server),
            'nodejs_version_server' => trim($nodejs_version_server),
            'created_by' => trim(Str::upper($created_by)),
            'created_at' => $created_at
        ]);
    }
}
