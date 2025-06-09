<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\App;

class ShowPagesController extends Controller
{

    // ADMIN LOGIN PAGE
    public function loginPAGE()
    {
        return view('login');
    }

    // ADMIN HOME PAGE
    public function homePAGE()
    {     
        $apps = App::listaApps();
        return view('homepage', compact('apps'));
    }

    public function acessosPAGE()
    {
        return view('acessos');
    }
}
