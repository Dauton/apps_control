<?php

namespace App\Http\Services;

use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class Operations
{
    public static function decryptID($value)
    {
        try {
            $value = Crypt::decrypt($value);
        } catch (DecryptException $e) {
            abort(403, 'Ops! algo deu errado.');
        }

        return $value;
    }

    public static function ifNull($value)
    {
        if(empty($value)) {
            $value = 'N/T';
        }
        return $value;
    }

    public static function formatDate($date)
    {
        return Carbon::parse($date)->format('d/m/Y - H:i');
    }
}