<?php

namespace Database\Seeders;

use App\Http\Services\Operations;
use App\Models\App;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AppsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $site_app = 'CORPORATIVO';
        $name_app = 'APP';
        $server_app = '10.10.10.100';
        $port_app = '1234';
        $server_db_app = '10.10.10.200';
        $name_db_app = '4321';
        $php_version_app = '8.4';
        $laravel_version_app = '12';
        $internal_url_app = 'https://10.10.10.100:4321/';
        $external_url_app = 'https://intranet.app.com.br';
        $repository_app = 'https://github.com/developer/app';
        $developer_app = 'DEVELOPER';
        $created_by = 'SEEDER'; // session('user.username');
        $created_at = now();

        // if = null; = N/T
        $internal_url_app = Operations::ifNull($internal_url_app);
        $external_url_app = Operations::ifNull($external_url_app);
        $repository_app = Operations::ifNull($repository_app);

        App::create([
            'site_app' => trim(Str::upper($site_app)),
            'name_app' => trim(Str::upper($name_app)),
            'server_app' => trim($server_app),
            'port_app' => trim($port_app),
            'server_db_app' => trim($server_db_app),
            'name_db_app' => trim($name_db_app),
            'php_version_app' => trim($php_version_app),
            'laravel_version_app' => trim($laravel_version_app),
            'internal_url_app' => trim($internal_url_app),
            'external_url_app' => trim($external_url_app),
            'repository_app' => trim($repository_app),
            'developer_app' => trim(Str::upper($developer_app)),
            'created_by' => trim(Str::upper($created_by)),
            'created_at' => $created_at
        ]);
    }
}
