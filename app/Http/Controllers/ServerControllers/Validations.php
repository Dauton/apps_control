<?php

namespace App\Http\Controllers\ServerControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Validations extends Controller
{
    public static function serverValidations(Request $request)
    {
        $request->validate(
            [
                'name_server' => ['required'],
                'ip_server' => ['required', 'ip']
            ],
            [
                'name_server.required' => 'Um nome deve ser dado ao servidor.',
                'ip_server.required' => 'O IP Address do servidor deve ser informado.',
                'ip_server.ip' => 'O IP Address informado não é válido.'
            ]
        );
    }
}
