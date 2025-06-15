<?php

namespace App\Imports;

use App\Http\Services\Operations;
use App\Models\App;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportExcelApp implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return App|null
     */

    public function model(array $row)
    {
        $site_app = Str::upper(trim($row['site_app']));
        $name_app = Str::upper(trim($row['name_app']));
        $server_app = trim($row['server_app']);
        $port_app = trim($row['port_app']);
        $server_db_app = trim($row['server_db_app']);
        $name_db_app = trim($row['name_db_app']);
        $php_version_app = trim($row['php_version_app']);
        $laravel_version_app = trim($row['laravel_version_app']);
        $url_intranet = trim($row['url_intranet']);
        $author_app = Str::upper(trim($row['author_app']));
        $created_by = session('user.name');
        $created_at = now();

         // if valor = null ou vazio, valor = 'N/T'
        $server_db_app = Operations::ifNull($server_db_app);
        $name_db_app = Operations::ifNull($name_db_app);
        $php_version_app = Operations::ifNull($php_version_app);
        $laravel_version_app = Operations::ifNull($laravel_version_app);
        $url_intranet = Operations::ifNull($url_intranet);

        return new App([
            'site_app' => $site_app,
            'name_app' => $name_app,
            'server_app' => $server_app,
            'port_app' => $port_app,
            'server_db_app' => $server_db_app,
            'name_db_app' => $name_db_app,
            'php_version_app' => $php_version_app,
            'laravel_version_app' => $laravel_version_app,
            'url_intranet' => $url_intranet,
            'author_app' => $author_app,
            'created_by' => $created_by,
            'created_at' => $created_at
        ]);
    }
}
