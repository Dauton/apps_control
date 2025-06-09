<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    public static function listaApps()
    {
        return self::get();
    }
}
