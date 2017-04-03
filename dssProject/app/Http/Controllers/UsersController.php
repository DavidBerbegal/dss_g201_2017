<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersController extends Controller
{
    public function index() {
        $users = DB::table('users')->paginate(15);
        return view('usuarios', ['users' => $users]);
    }

}
