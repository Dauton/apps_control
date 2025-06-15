<?php

namespace App\Imports;

use App\Http\Services\Operations;
use App\Models\Server;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportExcelServer implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Server|null
     */

    public function model(array $row)
    {
        $type_server = Str::upper(trim($row['type_server']));
        $name_server = Str::upper(trim($row['name_server']));
        $ip_server = trim($row['ip_server']);
        $os_server = Str::upper(trim($row['os_server']));
        $os_version_server = Str::upper(trim($row['os_version_server']));
        $php_version_server = trim($row['php_version_server']);
        $laravel_version_server = trim($row['laravel_version_server']);
        $created_by = session('user.name');
        $created_at = now();

         // if valor = null ou vazio, valor = 'N/T'
        $php_version_server = Operations::ifNull($php_version_server);
        $laravel_version_server = Operations::ifNull($laravel_version_server);

        return new Server([
            'type_server' => $type_server,
            'name_server' => $name_server,
            'ip_server' => $ip_server,
            'os_server' => $os_server,
            'os_version_server' => $os_version_server,
            'php_version_server' => $php_version_server,
            'laravel_version_server' => $laravel_version_server,
            'created_by' => $created_by,
            'created_at' => $created_at,
        ]);

    }
}
