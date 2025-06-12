<?php

namespace App\Http\Controllers\ShowPagesControllers;

use App\Http\Controllers\Controller;
use App\Http\Services\Operations;
use App\Models\Server;

class ServerPages extends Controller
{
    public function createServerPAGE()
    {   
        $servers = Server::listServers();

        return view('server.create', compact('servers'));
    }

    public function editServerPAGE($id)
    {
        $id = Operations::decryptID($id);
        $server = Server::where('id', $id)->first();

        return view('server.edit', compact('id', 'server'));
    }
}
