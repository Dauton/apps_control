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
        $type_server = 'Aplicações';
        $name_server = '200';
        $ip_server = '10.10.10.200';
        $os_server = 'Windows';
        $os_version_server = 'Server 2022';
        $php_version_server = '8.4';
        $laravel_version_server = '12';
        $created_by = "Dauton Pereira Félix"; // session('user.name')
        $created_at = now();

        $php_version_server = Operations::ifNull($php_version_server);
        $laravel_version_server = Operations::ifNull($laravel_version_server);

        Server::create([
            'type_server' => trim(Str::upper($type_server)),
            'name_server' => trim(Str::upper($name_server)),
            'ip_server' => Str::upper(trim($ip_server)),
            'os_server' => Str::upper(trim($os_server)),
            'os_version_server' => trim($os_version_server),
            'php_version_server' => trim($php_version_server),
            'laravel_version_server' => trim($laravel_version_server),
            'created_by' => trim(Str::upper($created_by)),
            'created_at' => $created_at
        ]);
    }
}
