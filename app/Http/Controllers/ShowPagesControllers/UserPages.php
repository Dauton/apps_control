<?php

namespace App\Http\Controllers\ShowPagesControllers;

use App\Http\Controllers\Controller;
use App\Http\Services\Operations;
use App\Http\Services\SapiensConnection;
use App\Models\User;
use Illuminate\Http\Request;

class UserPages extends Controller
{
    public function editUserPAGE($id)
    {
        $id = Operations::decryptID($id);
        $user = User::where('id', $id)->first();
        $collaborators = SapiensConnection::listCollaborators();

        return view('user.edit', compact('id', 'user', 'collaborators'));
    }
}
