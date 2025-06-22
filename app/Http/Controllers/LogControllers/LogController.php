<?php

namespace App\Http\Controllers\LogControllers;

use App\Http\Controllers\Controller;
use App\Models\Logs;
use Illuminate\Support\Str;

class LogController extends Controller
{
    public static function createLog(string $type, string $result, string $description)
    {
        Logs::create([
            'type' => Str::upper(trim($type)),
            'result' => Str::upper(trim($result)),
            'description' => Str::upper(trim($description)),
            'by' => session('user.username') ?? null,
            'origin_ip' => request()->ip(),
            'created_at' => now()
        ]);
    }
}
