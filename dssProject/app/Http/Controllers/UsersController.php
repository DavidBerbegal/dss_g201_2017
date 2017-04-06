<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersController extends Controller
{
    public function listUsers(Request $request) {
        if($request->has('users')){
           return view('usuarios', ['users' => $request->input('users'), 'mensaje' => $request->input('msg'),
                                'order' => $request->input('order')]); 
        }
        if($request->has('order') && $request->input('order') != ""){
            
            $users = DB::table('users')
                    ->orderBy($request->input('order'))
                    ->paginate(7);

            return view('usuarios', ['users' => $users, 'mensaje' => $request->input('msg'),
                                'order' => $request->input('order')]);
        }
        $users = DB::table('users')->paginate(7);
        return view('usuarios', ['users' => $users, 'mensaje' => $request->input('msg'),
                                'order' => 'id']);
        
    }

    public function showUser(Request $request){
        $id = $request->input('id');
        $usuario = User::findOrFail($id);

        return view('usuariosUpdate', ['id' => $id, 'name' => $usuario->name,
                                        'email' => $usuario->email, 'password' => $usuario->password]);
    }

    public function searchUser(Request $request){
       
        $name = $request->input('sName');
        $email = $request->input('sEmail');
        $users = DB::table('users')
            ->where('name','LIKE', "%$name%") 
            ->where('email', 'LIKE', "%$email%")->paginate(7);

        return view('usuarios', ['users' => $users, 'mensaje' => '',
                                'order' => 'id']);
        
    }

    public function createUser(Request $request){
        $mensaje = "";
        $this->validate($request, [
            'name' => 'required|min:2',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
        try{
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->save();
            $mensaje = "El usuario se ha creado correctamente";
            return redirect()->action('UsersController@listUsers', ['msg' => $mensaje]);
        }
        catch(RuntimeException $e){
            $mensaje = "Error al crear el usuario";
            return redirect()->action('UsersController@listUsers', ['msg' => $mensaje]);
        }

        catch(QueryException $e){
            $mensaje = "Error al crear el usuario";
            return redirect()->action('UsersController@listUsers', ['msg' => $mensaje]);
        }
        
    }

    public function updateUser(Request $request){
        $this->validate($request, [
            'name' => 'required|min:2',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
        $mensaje = "";
        try{
            $id = $request->input('id');
            $user = User::findOrFail($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->save();
            $mensaje = "El usuario con ID " . $id . " se ha modificado con éxito";
            return redirect()->action('UsersController@listUsers', ['msg' => $mensaje]);
        }catch(ModelNotFoundException $e){
            $mensaeje = "Ha ocurrido un error al intentar modificar el usuario";
            return redirect()->action('UsersController@listUsers', ['msg' => $mensaje]);
        }
      
           
        
    }

    public function deleteUser(Request $request){
        $mensaje = "";
        try{
            $id = $request->input('id');
            $user = User::findOrFail($id);
            $user->delete();
            $mensaje = "El usuario con ID " . $id . " ha sido borrado con éxito";
            return redirect()->action('UsersController@listUsers', ['msg' => $mensaje]);
        }catch (ModelNotFoundException $e){
            $mensaje = "Ha ocurrido un error al intentar borrar el usuario. Vuelve a intentarlo";
            return redirect()->action('UsersController@listUsers', ['msg' => $mensaje]);
        }
       
    }
}
