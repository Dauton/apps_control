<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogControllers\LogController;
use App\Http\Services\Operations;
use App\Models\App;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AppController extends Controller
{
    public function createApp(Request $request)
    {

        Validations::validationsApp($request);

        $site_app = $request->input('site_app'); // Obrigatório
        $name_app = $request->input('name_app'); // Obrigatório
        $server_app = $request->input('server_app'); // Obrigatório
        $port_app = $request->input('port_app'); // Obrigatório
        $server_db_app = $request->input('server_db_app');
        $name_db_app = $request->input('name_db_app');
        $php_version_app = $request->input('php_version_app');
        $laravel_version_app = $request->input('laravel_version_app');
        $url_intranet = $request->input('url_intranet');
        $author_app = $request->input('author_app'); // Obrigatório
        $created_by = session('user.name');
        $created_at = now();

         // if valor = null ou vazio, valor = 'N/T'
        $server_db_app = Operations::ifNull($server_db_app);
        $name_db_app = Operations::ifNull($name_db_app);
        $php_version_app = Operations::ifNull($php_version_app);
        $laravel_version_app = Operations::ifNull($laravel_version_app);
        $url_intranet = Operations::ifNull($url_intranet);

        App::create([
            'site_app' => trim(Str::upper($site_app)),
            'name_app' => trim(Str::upper($name_app)),
            'server_app' => trim($server_app),
            'port_app' => trim($port_app),
            'server_db_app' => trim($server_db_app),
            'name_db_app' => trim($name_db_app),
            'php_version_app' => trim($php_version_app),
            'laravel_version_app' => trim($laravel_version_app),
            'url_intranet' => trim($url_intranet),
            'author_app' => trim(Str::upper($author_app)),
            'created_by' => $created_by,
            'created_at' => $created_at
        ]);

        LogController::createLog('Cadastro', 'Sucesso', "Aplicação '$name_app' cadastrada");

        return redirect()->route('create-app')->with('alertSuccess', 'Aplicação cadastrada com sucesso.');
    }

    public function editApp(Request $request, $id)
    {

        Validations::validationsApp($request);

        $site_app = $request->input('site_app');
        $name_app = $request->input('name_app');
        $server_app = $request->input('server_app');
        $port_app = $request->input('port_app');
        $server_db_app = $request->input('server_db_app');
        $name_db_app = $request->input('name_db_app');
        $php_version_app = $request->input('php_version_app');
        $laravel_version_app = $request->input('laravel_version_app');
        $url_intranet = $request->input('url_intranet'); // if null ou vazio, intranet_app = 'N/T'
        $author_app = $request->input('author_app');
        $updated_at = now();

        // if null ou vazio, intranet_app = 'N/T'
        Operations::ifNull($url_intranet);

        App::where('id', $id)->update([
            'site_app' => trim(Str::upper($site_app)),
            'name_app' => trim(Str::upper($name_app)),
            'server_app' => trim($server_app),
            'port_app' => trim($port_app),
            'server_db_app' => trim($server_db_app),
            'name_db_app' => trim($name_db_app),
            'php_version_app' => trim($php_version_app),
            'laravel_version_app' => trim($laravel_version_app),
            'url_intranet' => trim($url_intranet),
            'author_app' => trim(Str::upper($author_app)),
            'updated_at' => $updated_at
        ]);

        LogController::createLog('Edição', 'Sucesso', "Aplicação '$name_app' editada");

        return redirect()->route('create-app')->with('alertSuccess', 'Aplicação editada com sucesso.');

    }

    public function deleteApp($id)
    {
        $id = Operations::decryptID($id);
        $name_app = App::select('name_app')->where('id', $id)->first();

        App::where('id', $id)->delete();

        LogController::createLog('Exclusão', 'Sucesso', "Aplicação '$name_app->name_app' excluída");

        return redirect()->route('create-app')->with('alertSuccess', 'Aplicação excluída com sucesso.');
    }
}
