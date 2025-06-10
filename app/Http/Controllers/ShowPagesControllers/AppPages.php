<?php

namespace App\Http\Controllers\ShowPagesControllers;

use App\Http\Controllers\Controller;
use App\Http\Services\Operations;
use App\Models\App;

class AppPages extends Controller
{
    public function createAppPAGE()
    {
        $apps = App::listApps();
        
        return view('app.create', compact('apps'));
    }
    
    public function editAppPAGE($id)
    {   
        $id = Operations::decryptID($id);
        $app = App::where('id', $id)->first();

        return view('app.edit', compact('app'));
    }
}
