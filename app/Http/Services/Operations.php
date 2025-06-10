<?php

namespace App\Http\Services;

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

    public static function ifNull($value, $final_value)
    {
        if(empty($value)) {
            $value = $final_value;
        }
    }
}