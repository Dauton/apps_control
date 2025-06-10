<?php

namespace App\Http\Controllers\ServerControllers;

use App\Http\Controllers\Controller;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServerController extends Controller
{
    public function createServer(Request $request)
    {

        Validations::serverValidations($request);

        $name_server = '200';
        $ip_server = '10.10.10.200';
        $php_version_server = '8.4';
        $laravel_version_server = '12';
        $created_by = "Dauton Pereira Félix"; // session('user.name')
        $created_at = now();

        Server::insert([
            'name_server' => trim(Str::upper($name_server)),
            'ip_server' => trim($ip_server),
            'php_version_server' => trim($php_version_server),
            'laravel_version_server' => trim($laravel_version_server),
            'created_by' => trim(Str::upper($created_by)),
            'created_at' => $created_at
        ]);

        return redirect()->route('create-server')->with('alertSuccess', 'Servidor cadastraco com sucesso.');

    }
}
