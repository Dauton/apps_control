<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PasswordControllers\Validations as PasswordControllersValidations;
use App\Models\User;
use Illuminate\Http\Request;

class Validations extends Controller
{
    public static function userValidations(Request $request)
    {
        $request->validate(
            [
                'name' => ['required'],
                'username' => ['required', 'unique:users,username'],
            ],
            [
                'name.required' => 'O nome deve ser informado.',
                'username.required' => ' O usuário deve ser informado.',
                'username.unique' => 'O usuário informado já existe.'
            ]
        );

        PasswordControllersValidations::passwordValidations($request);
    }

    public static function editUserValidations(Request $request, $id)
    {

        $request->validate(
            [
                'name' => ['required'],
                'username' => ['required'],
            ],
            [
                'name.required' => 'O nome deve ser informado.',
                'username.required' => ' O usuário deve ser informado.',
            ]
        );

        $currentUser = User::where('id', $id)->first();

        if ($request->input('username') !== $currentUser->username) {
            $request->validate(
                [
                    'username' => ['unique:users,username'],
                ],
                [
                    'username.unique' => 'O usuário informado já existe'
                ]
            );
        }
    }
}
