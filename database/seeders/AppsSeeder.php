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
        $url_intranet = 'https://intranet.app.com.br'; // if null, url_intranet = 'NÃO'
        $author_app = 'Developer';
        $created_by = 'Seeder'; // session('user.username');
        $created_at = now();

        $url_intranet = Operations::ifNull($url_intranet);

        App::create([
            'site_app' => trim(Str::upper($site_app)),
            'name_app' => trim(Str::upper($name_app)),
            'server_app' => trim($server_app),
            'port_app' => trim($port_app),
            'server_db_app' => trim($server_db_app),
            'name_db_app' => trim($name_db_app),
            'php_version_app' => trim($php_version_app),
            'laravel_version_app' => trim($laravel_version_app),
            'url_intranet' => trim($url_intranet),
            'author_app' => trim(Str::upper($author_app)),
            'created_by' => trim(Str::upper($created_by)),
            'created_at' => $created_at
        ]);
    }
}
