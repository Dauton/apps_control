<?php

namespace App\Http\Controllers\ShowPagesControllers;
use App\Http\Controllers\Controller;
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

    // HOME PAGE
    public function homePAGE()
    {
        $apps = App::listLast10Apps();
        return view('homepage', compact('apps'));
    }

    //
    public function registrationsPAGE()
    {
        $lastApp = App::lastApp();
        $lastServer = Server::lastServer();
        $countApps = App::countApps();
        $countServers = Server::countServers();

        return view('registrations', compact('lastApp', 'lastServer', 'countApps', 'countServers'));
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

        return view('admin', compact('listUsers'));
    }

    // LOGS PAGE
    public function logsPAGE()
    {
        $logs = Logs::listLogs();

        return view('logs', compact('logs'));
    }
}
