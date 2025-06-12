<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
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
        $created_by = session('user.name');
        $created_at = now();

        User::insert([
            'name' => Str::upper(trim($name)),
            'username' => Str::upper(trim($username)),
            'password' => password_hash(trim($password), PASSWORD_ARGON2ID),
            'created_by' => $created_by,
            'created_at' => $created_at
        ]);

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

        return redirect()->route('admin')->with('alertSuccess', 'Usúario editado com sucesso.');
    }
    public function deleteUser($id)
    {
        $id = Operations::decryptID($id);

        USer::where('id', $id)->delete();

        return redirect()->route('admin')->with('alertSuccess', 'Usuário excluído com sucesso.');
    }
}
