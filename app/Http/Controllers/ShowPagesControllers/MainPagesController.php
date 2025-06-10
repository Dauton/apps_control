<?php

namespace App\Http\Controllers\ShowPagesControllers;
use App\Http\Controllers\Controller;
use App\Models\App;

class MainPagesController extends Controller
{

    // LOGIN PAGE
    public function loginPAGE()
    {
        return view('login');
    }

    // HOME PAGE
    public function homePAGE()
    {     
        $apps = App::listApps();
        return view('homepage', compact('apps'));
    }

    //
    public function registrationsPAGE()
    {
        return view('registrations');
    }

    // ADMIN PAGE
    public function adminPAGE()
    {
        return view('admin');
    }
}
