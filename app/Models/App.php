<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
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
}
