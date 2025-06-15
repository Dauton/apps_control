<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Server extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'type_server',
        'name_server',
        'ip_server',
        'os_server',
        'os_version_server',
        'php_version_server',
        'laravel_version_server',
        'created_by'
    ];

    public static function listServers()
    {
        return self::get();
    }

    public static function listServersTypeApps()
    {
        return self::whereIn('type_server', ['APLICAÇÕES', 'APLICAÇÕES E BANCO DE DADOS'])->get();

    }

    public static function listServersTypeDB()
    {
        return self::where('type_server', ['BANCO DE DADOS', 'APLICAÇÕES E BANCO DE DADOS'])->get();
    }

    public static function lastServer()
    {
        return self::select('ip_server', 'created_at')->orderBy('id', 'DESC')->first();
    }

    public static function countServers()
    {
        return self::count();
    }
}
