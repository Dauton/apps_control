<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Validations extends Controller
{
    public static function validationsApp(Request $request)
    {

        // SE FOR INFORMADO ALGO DIFERENTE DE "N/T", A URL SERÁ VALIDADA
        $internal_url_app = $request->input('internal_url_app');
        $external_url_app = $request->input('external_url_app');
        $repository_app = $request->input('repository_app');

        if(!empty($internal_url_app) && $internal_url_app !== 'N/T') {
            $request->validate([
                    'internal_url_app' => ['url']
                ], [
                    'internal_url_app.url' => 'A URL informada não é válida.'
                ]
            );
        }
        if(!empty($external_url_app) && $external_url_app !== 'N/T') {
            $request->validate([
                    'external_url_app' => ['url']
                ], [
                    'external_url_app.url' => 'A URL informada não é válida.'
                ]
            );
        }
        if(!empty($repository_app) && $repository_app !== 'N/T') {
            $request->validate([
                    'repository_app' => ['url']
                ], [
                    'repository_app.url' => 'A URL informada não é válida.'
                ]
            );
        }

        $request->validate(
            [
                'site_app'   => ['required'],
                'name_app'   => ['required'],
                'server_app' => ['ip'],
                'port_app'   => ['required', 'integer'],
                'developer_app' => ['required']
            ],
            [
                // REQUIREDS
                'site_app.required'   => 'O site da aplicação deve ser informado.',
                'name_app.required'   => 'O nome da aplicação deve ser informado.',
                'port_app.required'   => 'A porta da aplicação deve ser informada.',
                'developer_app.required' => 'O nome do autor deve ser informado.',

                // DE MAIS
                'server_app.ip'    => 'O servidor informado não é válido.',
                'port_app.integer' => 'A porta informada não é válida.'
            ]
        );
    }
}
