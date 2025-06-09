<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ValidationsApp extends Controller
{
    public static function validationsApp(Request $request)
    {
        $request->validate(
            [
                'site_app'   => ['required'],
                'name_app'   => ['required'],
                'server_app' => ['required', 'ip'],
                'port_app'   => ['required', 'integer'],
                'author_app' => ['required']
            ],
            [
                // REQUIREDS
                'site_app.required'   => 'O site da ferramenta deve ser informado.',
                'name_app.required'   => 'O nome da ferramenta deve ser informado.',
                'server_app.required' => 'O IP do servidor deve ser informado',
                'port_app.required'   => 'A porta da ferramenta deve ser informada.',
                'author_app.required' => 'O nome do autor deve ser informado.',
                
                // DE MAIS
                'server_app.ip'    => 'O servidor informado não é válido.',
                'port_app.integer' => 'A porta informada não é válida.'
            ]
        );
    }
}
