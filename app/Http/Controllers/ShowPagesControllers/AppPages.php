<?php

namespace App\Http\Controllers\ShowPagesControllers;

use App\Http\Controllers\Controller;
use App\Http\Services\Operations;
use App\Http\Services\SapiensConnection;
use App\Models\App;
use App\Models\Server;

class AppPages extends Controller
{
    public function createAppPAGE()
    {
        $apps = App::listApps();
        $sites = SapiensConnection::listSites();
        $collaborators = SapiensConnection::listCollaborators();

        $apps_servers = Server::listServersTypeApps();
        $db_servers = Server::listServersTypeDB();

        return view('app.create', compact('apps', 'sites', 'collaborators', 'apps_servers', 'db_servers'));
    }

    public function editAppPAGE($id)
    {
        $id = Operations::decryptID($id);
        $app = App::where('id', $id)->first();
        $sites = SapiensConnection::listSites();
        $collaborators = SapiensConnection::listCollaborators();

        $apps_servers = Server::listServersTypeApps();
        $db_servers = Server::listServersTypeDB();

        return view('app.edit', compact('app', 'sites', 'collaborators', 'apps_servers', 'db_servers'));
    }
}
