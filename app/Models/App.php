<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class App extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'site_app',
        'name_app',
        'server_app',
        'port_app',
        'server_db_app',
        'name_db_app',
        'php_version_app',
        'laravel_version_app',
        'internal_url_app',
        'external_url_app',
        'repository_app',
        'author_app',
        'created_by'
    ];

    public static function listServerApps($ip_server)
    {
        return self::where('server_app', $ip_server)->get();
    }

    public static function listAllApps()
    {
        return self::get();
    }
}
