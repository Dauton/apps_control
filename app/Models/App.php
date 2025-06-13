<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{

    protected $fillable = [
        'site_app',
        'name_app',
        'server_app',
        'port_app',
        'server_db_app',
        'name_db_app',
        'php_version_app',
        'laravel_version_app',
        'url_intranet',
        'author_app',
        'created_by',
        'created_at',
        'updated_at'
    ];

    public static function listApps()
    {
        return self::get();
    }

    public static function listLast10Apps()
    {
        return self::orderBy('id', 'DESC')->limit(10)->get();
    }

    public static function lastApp()
    {
        return self::select('name_app', 'created_at')->orderBy('id', 'DESC')->first();
    }

    public static function countApps()
    {
        return self::count();
    }
}
