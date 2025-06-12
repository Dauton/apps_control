<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public static function listUsers()
    {
        return self::get();
    }
}
