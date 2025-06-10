<?php

namespace Database\Seeders;

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
        $site_app = 'SIGLAS';
        $name_app = 'Descrição ferramenta';
        $server_app = '10.10.10.100';
        $port_app = '1234';
        $server_db_app = '10.10.10.200';
        $name_db_app = '4321';
        $php_version_app = '8.4';
        $laravel_version_app = '12';
        $url_intranet = 'https://intranet.app.com.br'; // if null, url_intranet = 'NÃO'
        $author_app = 'Dauton Pereira Félix';
        $created_by = 'Dauton Pereira Félix'; // session('usuario.nome');

        App::create([
            'site_app' => trim(Str::upper($site_app)),
            'name_app' => trim(Str::upper($name_app)),
            'server_app' => trim($server_app),
            'port_app' => trim($port_app),
            'server_db_app' => trim($server_db_app),
            'name_db_app' => trim($name_db_app),
            'php_version_app' => trim($php_version_app),
            'larvel_version_app' => trim($laravel_version_app),
            'url_intranet' => trim($url_intranet),
            'author_app' => trim(Str::upper($author_app)),
            'created_by' => $created_by
        ]);
    }
}
