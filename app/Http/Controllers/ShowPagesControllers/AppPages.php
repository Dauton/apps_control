<?php

namespace App\Http\Controllers\ShowPagesControllers;

use App\Http\Controllers\Controller;
use App\Http\Services\Operations;
use App\Models\App;
use App\Models\Server;

class AppPages extends Controller
{
    public function createAppPAGE()
    {
        $apps = App::listApps();
           
        $apps_servers = Server::listServersTypeApps();
        $db_servers = Server::listServersTypeDB();
        
        return view('app.create', compact('apps', 'apps_servers', 'db_servers'));
    }
    
    public function editAppPAGE($id)
    {   
        $id = Operations::decryptID($id);
        $app = App::where('id', $id)->first();
           
        $apps_servers = Server::listServersTypeApps();
        $db_servers = Server::listServersTypeDB();

        return view('app.edit', compact('app', 'apps_servers', 'db_servers'));
    }
}
