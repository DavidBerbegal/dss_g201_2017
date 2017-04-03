<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersController extends Controller
{
    public function listUsers() {
        $users = DB::table('users')->paginate(15);
        return view('usuarios', ['users' => $users]);
    }

    public function createUser($name, $email, $password){
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->save();
        return redirect('');
    }

    public function updateUser($id, $name, $email, $password){
        $user = User::find($id);
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->save();
        return redirect('');
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
    }
}
