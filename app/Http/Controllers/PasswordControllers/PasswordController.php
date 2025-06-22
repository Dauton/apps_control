<?php

namespace App\Http\Controllers\PasswordControllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogControllers\LogController;
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
                'password' => password_hash(trim($password), PASSWORD_ARGON2ID),
            ]
        );

        if($id == session('user.id')) {
            LogController::createLog('Senha', 'Sucesso', 'Alterou a própria senha');
            return redirect()->route('servers')->with('alertSuccess', 'Senha alterada com sucesso.');
        }

        $username = User::select('username')->where('id', $id)->first();
        LogController::createLog('Senha', 'Sucesso', "Alterou a senha do usuário '$username->username'");
        return redirect()->back()->with('alertSuccess', 'Senha do usuário alterada com sucesso.');
    }

}
