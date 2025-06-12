<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Validations extends Controller
{
    public static function validationsApp(Request $request)
    {

        // SE FOR INFORMADO ALGO DIFERENTE DE "NÃO", A URL SERÁ VALIDADA
        $url_intranet = $request->input('url_intranet');

        if(!empty($url_intranet) && $url_intranet !== 'NÃO') {
            $request->validate([
                    'url_intranet' => ['url']
                ], [
                    'url_intranet.url' => 'A URL informada não é válida.'
                ]
            );
        }

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
                'site_app.required'   => 'O site da aplicação deve ser informado.',
                'name_app.required'   => 'O nome da aplicação deve ser informado.',
                'server_app.required' => 'O IP do servidor deve ser informado.',
                'port_app.required'   => 'A porta da aplicação deve ser informada.',
                'author_app.required' => 'O nome do autor deve ser informado.',
                
                // DE MAIS
                'server_app.ip'    => 'O servidor informado não é válido.',
                'port_app.integer' => 'A porta informada não é válida.'
            ]
        );
    }
}
