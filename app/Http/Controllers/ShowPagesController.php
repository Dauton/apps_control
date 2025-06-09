<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\App;

class ShowPagesController extends Controller
{

    // ADMIN LOGIN PAGE
    public function adminLoginPAGE()
    {
        return view('admin/login');
    }

    // ADMIN HOME PAGE
    public function adminHomePAGE()
    {     
        $apps = App::listaApps();
        return view('admin/homepage', compact('apps'));
    }

    public function adminAcessosPAGE()
    {
        return view('admin.acessos');
    }
}
