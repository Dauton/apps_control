<?php

namespace App\Http\Controllers\PasswordControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PasswordController extends Controller
{
    public function editPassword(Request $request, $id)
    {
        Validations::passwordValidations($request);

        $password = $request->input('password');

        User::where('id', $id)->update(
            [
                'password' => password_hash($password, PASSWORD_ARGON2ID)
            ]
        );

        $alertSucces = 'Senha alterada com sucesso.';
        if($id == session('user.id')) {
            return redirect()->route('homepage')->with('alertSuccess', $alertSucces);
        }
        return redirect()->route('edit-user', Crypt::encrypt($id))->with('alertSuccess', $alertSucces);
    }

}
