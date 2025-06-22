<?php

namespace App\Http\Controllers\ServerControllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogControllers\LogController;
use App\Http\Services\Operations;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServerController extends Controller
{
    public function createServer(Request $request)
    {

        Validations::serverValidations($request, );

        $type_server = $request->input('type_server'); // Obrigatório
        $name_server = $request->input('name_server'); // Obrigatório
        $ip_server = $request->input('ip_server'); // Obrigatório
        $os_server = $request->input('os_server'); // Obrigatório
        $php_version_server = $request->input('php_version_server');
        $python_version_server = $request->input('python_version_server');
        $npm_version_server = $request->input('npm_version_server');
        $nodejs_version_server = $request->input('nodejs_version_server');
        $created_by = session('user.name');
        $created_at = now();

         // if valor = null ou vazio, valor = 'N/T'
        $php_version_server = Operations::ifNull($php_version_server);
        $python_version_server = Operations::ifNull($python_version_server);
        $npm_version_server = Operations::ifNull($npm_version_server);
        $nodejs_version_server = Operations::ifNull($nodejs_version_server);

        Server::create([
            'type_server' => trim(Str::upper($type_server)),
            'name_server' => trim(Str::upper($name_server)),
            'ip_server' => trim($ip_server),
            'os_server' => Str::upper(trim($os_server)),
            'php_version_server' => trim($php_version_server),
            'python_version_server' => trim($python_version_server),
            'npm_version_server' => trim($npm_version_server),
            'nodejs_version_server' => trim($nodejs_version_server),
            'created_by' => trim(Str::upper($created_by)),
            'created_at' => $created_at
        ]);

        LogController::createLog('Criação', 'Sucesso', "Servidor '$ip_server' cadastrado");

        return redirect()->route('create-server')->with('alertSuccess', 'Servidor cadastrado com sucesso.');

    }

    public function editServer(Request $request, $id)
    {
        Validations::editServerValidations($request, $id);

        $type_server = $request->input('type_server');
        $name_server = $request->input('name_server');
        $ip_server = $request->input('ip_server');
        $os_server = $request->input('os_server');
        $php_version_server = $request->input('php_version_server');
        $python_version_server = $request->input('python_version_server');
        $npm_version_server = $request->input('npm_version_server');
        $nodejs_version_server = $request->input('nodejs_version_server');
        $updated_at = now();

        $php_version_server = Operations::ifNull($php_version_server);
        $python_version_server = Operations::ifNull($python_version_server);
        $npm_version_server = Operations::ifNull($npm_version_server);
        $nodejs_version_server = Operations::ifNull($nodejs_version_server);

        Server::where('id', $id)->update([
            'type_server' => trim(Str::upper($type_server)),
            'name_server' => trim(Str::upper($name_server)),
            'ip_server' => trim($ip_server),
            'os_server' => Str::upper(trim($os_server)),
            'php_version_server' => trim($php_version_server),
            'python_version_server' => trim($python_version_server),
            'npm_version_server' => trim($npm_version_server),
            'nodejs_version_server' => trim($nodejs_version_server),
            'updated_at' => $updated_at
        ]);

        LogController::createLog('Edição', 'Sucesso', "Servidor '$ip_server' editado");

        return redirect()->route('create-server')->with('alertSuccess', 'Servidor editado com sucesso.');
    }

    public function deleteServer($id)
    {
        $id = Operations::decryptID($id);
        $ip_server = Server::select('ip_server')->where('id', $id)->first();

        Server::where('id', $id)->delete();

        LogController::createLog('Create', 'Sucesso', "Servidor '$ip_server->ip_server' excluído");

        return redirect()->route('create-server')->with('alertSuccess', 'Servidor excluído com sucesso.');
    }
}
