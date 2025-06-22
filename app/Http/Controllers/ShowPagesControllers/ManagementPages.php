<?php

namespace App\Http\Controllers\ShowPagesControllers;

use App\Http\Controllers\Controller;
use App\Http\Services\Operations;
use App\Models\App;
use App\Models\Server;
use Illuminate\Http\Request;

class ManagementPages extends Controller
{
    public function managementServerPAGE($id)
    {
        $id = Operations::decryptID($id);
        $server = Server::where('id', $id)->first();

        $apps = App::listServerApps($server->ip_server);

        return view('managements.server', compact('server', 'apps'));
    }
}
