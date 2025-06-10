<?php

namespace App\Http\Controllers\ShowPagesControllers;

use App\Http\Controllers\Controller;
use App\Http\Services\Operations;
use App\Models\User;

class PassowrdPages extends Controller
{
    public function editPasswordPAGE($id)
    {
        $id = Operations::decryptID($id);
        $user = User::where('id', $id)->first();

        return view('password.edit', compact('user'));
    }
}
