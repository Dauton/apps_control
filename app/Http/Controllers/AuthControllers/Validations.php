<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Validations extends Controller
{
    public static function validationsLogin(Request $request)
    {
        $request->validate(
            [
                'username' => ['required'],
                'password' => ['required']
            ],
            [
                'username.required' => 'O usuário deve ser informado.',
                'password.required' => 'A senha deve ser informada.'
            ]
        );
    }

}
