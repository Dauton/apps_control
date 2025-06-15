<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'username',
        'passsword',
        'last_login',
    ];

    public static function listUsers()
    {
        return self::get();
    }
}
