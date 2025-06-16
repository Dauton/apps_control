<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogControllers\LogController;
use App\Http\Services\Operations;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        Validations::userValidations($request);

        $name = $request->input('name');
        $username = $request->input('username');
        $password = $request->input('password');
        $theme_preference = 'LIGHT';
        $created_by = session('user.name');
        $created_at = now();

        User::create([
            'name' => Str::upper(trim($name)),
            'username' => Str::upper(trim($username)),
            'password' => password_hash(trim($password), PASSWORD_ARGON2ID),
            'theme_preference' => $theme_preference,
            'created_by' => $created_by,
            'created_at' => $created_at
        ]);

        LogController::createLog('Criação', 'Sucesso', "Usuário '$username' cadastrado");

        return redirect()->route('admin')->with('alertSuccess', 'Usuário cadastrado com sucesso.');
    }

    public function editUser(Request $request, $id)
    {

        Validations::editUserValidations($request, $id);

        $name = $request->input('name');
        $username = $request->input('username');
        $updated_at = now();

        User::where('id', $id)->update([
            'name' => Str::upper(trim($name)),
            'username' => Str::upper(trim($username)),
            'updated_at' => $updated_at
        ]);

        LogController::createLog('Edição', 'Sucesso', "Usuário '$username' editado");

        return redirect()->route('admin')->with('alertSuccess', 'Usúario editado com sucesso.');
    }
    public function deleteUser($id)
    {
        $id = Operations::decryptID($id);
        $username = User::select('username')->where('id', $id)->first();

        USer::where('id', $id)->delete();

        LogController::createLog('Create', 'Sucesso', "Usuário '$username->username' excluído");

        return redirect()->route('admin')->with('alertSuccess', 'Usuário excluído com sucesso.');
    }

    public function changeTheme(Request $request, $id)
    {
        $theme_preference = $request->input('theme_preference');
        $id = Operations::decryptID($id);

        User::where('id', $id)->update([
            'theme_preference' => $theme_preference
        ]);

        $searchUser = User::where('id', $id)->first();

        session()->invalidate();
        session()->regenerate();
        session()->regenerateToken();
        session([
            'user' => [
                'id' => $searchUser->id,
                'name' => $searchUser->name,
                'username' => $searchUser->username,
                'theme_preference' => $searchUser->theme_preference
            ]
        ]);

        return redirect()->back()->with('alertSuccess', 'Tema alterado com sucesso.');

    }
}
