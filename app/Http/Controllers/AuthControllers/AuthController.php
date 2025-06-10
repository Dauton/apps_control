<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Controllers\Controller;
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
            return $error;
        }

        if(!password_verify($password, $searchUser->password)) {
            return $error;
        }

        session([
            'user' => [
                'id' => $searchUser->id,
                'name' => $searchUser->name,
                'username' => $searchUser->username
            ]
        ]);

        $searchUser->last_login = now();
        $searchUser->save();

        return redirect(route('homepage'))->with('alertSuccess', 'Logado com sucesso.');

    }

    public function logout()
    {
        session()->invalidate();
        session()->regenerate();
        session()->regenerateToken();

        return redirect()->route('login');
    }
}
