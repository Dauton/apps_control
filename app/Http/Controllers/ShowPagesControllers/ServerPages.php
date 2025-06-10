<?php

namespace App\Http\Controllers\ShowPagesControllers;

use App\Http\Controllers\Controller;
use App\Models\Server;

class ServerPages extends Controller
{
    public function createServerPAGE()
    {   
        $servers = Server::listServers();

        return view('server.create', compact('servers'));
    }
}
