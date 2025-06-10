<?php

namespace App\Http\Controllers\PasswordControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Validations extends Controller
{
    public static function passwordValidations(Request $request)
    {
        $request->validate(
            [
                'password' => [
                    'required',
                    'min:12',
                    'regex: /[A-Z]/', 'regex: /[0-9]/', 'regex: /[!@#$%^&*(),.?":{}|<>]/',
                ],
                'password-repeat' => ['required', 'same:password']
            ],
            [
                'password.required' => 'A senha deve ser informada.',
                'password.min' => 'A senha deve conter no mínimo :min dígitos.',
                'password.regex' => 'A senha deve conter letra maiúscula, letra minúscula e um caractere especial.',
                
                'password-repeat.required' => 'Repita a senha.',
                'password-repeat.same' => 'As senha não conferem.'
            ]
        );
    }
}
