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
        $listServers = Server::listServers();
        
        return view('app.create', compact('apps', 'listServers'));
    }
    
    public function editAppPAGE($id)
    {   
        $id = Operations::decryptID($id);
        $app = App::where('id', $id)->first();

        return view('app.edit', compact('app'));
    }
}
