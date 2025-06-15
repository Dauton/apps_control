<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $fillable = [
        'type',
        'result',
        'description',
        'by'
    ];

    public static function listLogs()
    {
        return Logs::limit(200)->get();
    }
}
