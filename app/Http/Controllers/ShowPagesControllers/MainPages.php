<?php

namespace App\Http\Controllers\ShowPagesControllers;
use App\Http\Controllers\Controller;
use App\Http\Services\SapiensConnection;
use App\Models\App;
use App\Models\Logs;
use App\Models\Server;
use App\Models\User;

class MainPages extends Controller
{

    // LOGIN PAGE
    public function loginPAGE()
    {
        return view('login');
    }

    // SERVERS APP - HOMEPAGE
    public function serversPAGE()
    {
        $servers = Server::listServers();

        return view('servers', compact('servers'));
    }

    // IMPORTATION PAGE
    public function importationPAGE()
    {
        return view('importation');
    }

    // ADMIN PAGE
    public function adminPAGE()
    {
        $listUsers = User::listUsers();
        $collaborators = SapiensConnection::listCollaborators();

        return view('admin', compact('listUsers', 'collaborators'));
    }

    // LOGS PAGE
    public function logsPAGE()
    {
        $logs = Logs::listLogs();

        return view('logs', compact('logs'));
    }
}
