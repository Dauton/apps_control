<?php

namespace App\Imports;

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
        return new App([
            'site_app' => empty(Str::upper(trim($row['site_app']))),
            'name_app' => Str::upper(trim($row['name_app'])),
            'server_app' => trim($row['server_app']),
            'port_app' => trim($row['port_app']),
            'server_db_app' => trim($row['server_db_app']),
            'name_db_app' => trim($row['name_db_app']),
            'php_version_app' => trim($row['php_version_app']),
            'laravel_version_app' => trim($row['laravel_version_app']),
            'url_intranet' => trim($row['url_intranet']),
            'author_app' => Str::upper(trim($row['author_app'])),
            'created_by' => session('user.name'),
            'created_at' => now(),
            'updated_at' => null,
        ]);
    }
}
