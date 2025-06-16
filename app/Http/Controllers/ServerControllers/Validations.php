<?php

namespace App\Http\Controllers\ServerControllers;

use App\Http\Controllers\Controller;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Validations extends Controller
{
    public static function serverValidations(Request $request)
    {
        $request->validate(
            [
                'type_server' => ['required'],
                'name_server' => ['required'],
                'ip_server' => ['required', 'ip', Rule::unique('servers', 'ip_server')->whereNull('deleted_at')],
                'os_server' => ['required'],
                'os_version_server' => ['required'],
            ],
            [
                // REQUIRED
                'type_server.required' => 'O tipo do servidor deve ser informado.',
                'name_server.required' => 'Um nome deve ser dado ao servidor.',
                'os_server.required' => 'O sistema operacional do servidor deve ser informado.',
                'os_version_server.required' => 'A versão do sistema operacional deve ser informado.',
                'ip_server.required' => 'O IP Address do servidor deve ser informado.',

                // DE MAIS
                'ip_server.ip' => 'O IP Address informado não é válido.',
                'ip_server.unique' => 'Um servidor com esse IP já foi cadastrado.',
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
                'os_server.required' => 'O sistema operacional do servidor deve ser informado.',
                'os_version_server.required' => 'A versão do sistema operacional deve ser informado.',
                
                'ip_server.ip' => 'O IP Address informado não é válido.',
            ]
        );
        $request->validate(
            [
                'ip_server' => [Rule::unique('servers', 'ip_server')->ignore($id)->whereNull('deleted_at')]
            ], [
                'ip_server.unique' => 'Um servidor com esse IP já foi cadastrado.',
            ]
        );
    }
}
