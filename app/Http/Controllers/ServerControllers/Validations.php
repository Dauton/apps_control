<?php

namespace App\Http\Controllers\ServerControllers;

use App\Http\Controllers\Controller;
use App\Models\Server;
use Illuminate\Http\Request;

class Validations extends Controller
{
    public static function serverValidations(Request $request)
    {
        $request->validate(
            [
                'type_server' => ['required'],
                'name_server' => ['required'],
                'ip_server' => ['required', 'ip', 'unique:servers,ip_server'],
                'os_server' => ['required'],
                'os_version_server' => ['required']
            ],
            [
                'type_server.required' => 'O tipo do servidor deve ser informado.',
                'name_server.required' => 'Um nome deve ser dado ao servidor.',
                'ip_server.required' => 'O IP Address do servidor deve ser informado.',
                'ip_server.ip' => 'O IP Address informado não é válido.',
                'ip_server.unique' => 'Um servidor com esse IP já foi cadastrado.',
                'os_server.required' => 'O sistema operacional do servidor deve ser informado.',
                'os_version_server.required' => 'A versão do sistema operacional deve ser informado.'
            ]
        );
    }

    public static function editServerValidations(Request $request, $id)
    {
        $request->validate(
            [
                'type_server' => ['required'],
                'name_server' => ['required'],
                'ip_server' => ['required', 'ip'],
                'os_server' => ['required'],
                'os_version_server' => ['required']
            ],
            [
                'type_server.required' => 'O tipo do servidor deve ser informado.',
                'name_server.required' => 'Um nome deve ser dado ao servidor.',
                'ip_server.required' => 'O IP Address do servidor deve ser informado.',
                'ip_server.ip' => 'O IP Address informado não é válido.',
                'os_server.required' => 'O sistema operacional do servidor deve ser informado.',
                'os_version_server.required' => 'A versão do sistema operacional deve ser informado.'
            ]
        );

        $actualServer = Server::where('id', $id)->first();

        if($request->input('ip_server') !== $actualServer->ip_server) {
            $request->validate(
                [
                    'ip_server' => ['unique:servers,ip_server'],
                ], [
                    'ip_server.unique' => 'Um servidor com esse IP já foi cadastrado.',
                ]
            );
        }
    }
}
