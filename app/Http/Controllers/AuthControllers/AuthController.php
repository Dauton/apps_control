<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogControllers\LogController;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
        public function auth(Request $request)
    {

        Validations::validationsLogin($request);

        $username = $request->input('username');
        $password = $request->input('password');

        $searchUser = User::where('username', $username)->first();

        $error = redirect()->back()->withInput()->with('loginError', 'Credenciais inválidas.');

        if(!$searchUser) {
            LogController::createLog('Login', 'Erro', "$username - Usuário não encontrado");
            return $error;
        }

        if(!password_verify($password, $searchUser->password)) {
            LogController::createLog('Login', 'Erro', 'Senha incorreta');
            return $error;
        }

        session([
            'user' => [
                'id' => $searchUser->id,
                'name' => $searchUser->name,
                'username' => $searchUser->username,
                'theme_preference' => $searchUser->theme_preference
            ]
        ]);

        $searchUser->last_login = now();
        $searchUser->save();

        LogController::createLog('Login', 'Sucesso', 'Login efetuado');

        return redirect()->route('servers')->with('alertSuccess', 'Logado com sucesso.');

    }

    public function logout()
    {

        LogController::createLog('Logout', 'Sucesso', 'Logout efetuado');

        session()->invalidate();
        session()->regenerate();
        session()->regenerateToken();

        return redirect()->route('login');
    }
}
