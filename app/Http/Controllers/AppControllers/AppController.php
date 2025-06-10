<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Http\Services\Operations;
use App\Models\App;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AppController extends Controller
{
    public function createApp(Request $request)
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
        $url_intranet = $request->input('url_intranet'); // if null ou vazio, intranet_app = 'NÃO'
        $author_app = $request->input('author_app');
        $created_by = session('user.name');
        $created_at = now();
        
         // if null ou vazio, intranet_app = 'NÃO'
        Operations::ifNull($url_intranet, 'NÃO');

        App::insert([
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

        return redirect()->route('homepage')->with('alertSuccess', 'Ferramenta cadastrada com sucesso.');
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
        $url_intranet = $request->input('url_intranet'); // if null ou vazio, intranet_app = 'NÃO'
        $author_app = $request->input('author_app');
        $updated_at = now();

        // if null ou vazio, intranet_app = 'NÃO'
        Operations::ifNull($url_intranet, 'NÃO');

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

        return redirect()->route('create-app')->with('alertSuccess', 'Ferramenta editada com sucesso.');

    }
}
