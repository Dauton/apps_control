<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AuthController extends Controller
{
        public function auth(Request $request)
    {

        AuthValidations::validationsLogin($request);

        $usuario = $request->input('usuario');
        $senha = $request->input('senha');

        $buscaUsuario = Usuario::where('usuario', $usuario)->first();

        $erro = redirect()->back()->withInput()->with('loginError', 'Credenciais inválidas.');

        if(!$buscaUsuario) {
            return $erro;
        }

        if(!password_verify($senha, $buscaUsuario->senha)) {
            return $erro;
        }

        session([
            'usuario' => [
                'id' => $buscaUsuario->id,
                'nome' => $buscaUsuario->nome,
                'usuario' => $buscaUsuario->usuario
            ]
        ]);

        $buscaUsuario->ultimo_login = now();
        $buscaUsuario->save();

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
