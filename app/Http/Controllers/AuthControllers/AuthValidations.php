<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthValidations extends Controller
{
    public static function validationsLogin(Request $request)
    {
        $request->validate(
            [
                'usuario' => ['required'],
                'senha' => ['required']
            ],
            [
                'usuario.required' => 'O e-mail deve ser informado.',
                'senha.required' => 'A senha deve ser informada.'
            ]
        );
    }

}
