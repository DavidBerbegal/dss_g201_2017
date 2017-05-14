<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Categorysubscription;
use App\Sourcesubscription;
use Illuminate\Validation\Rule;

class usuariosController extends Controller
{
    public function listUsers(Request $request) {
        $mensaje = session('mensaje');
        if($request->has('users')){
         
           return view('usuarios', ['users' => $request->input('users'),
                                'order' => $request->input('order')])->with('mensaje', $mensaje); 
        }
        if($request->has('order') && $request->input('order') != ""){
            
            $users = DB::table('users')
                    ->orderBy($request->input('order'))
                    ->paginate(7);

            return view('usuarios', ['users' => $users,
                                'order' => $request->input('order')])->with('mensaje', $mensaje);
        }
        $users = DB::table('users')->paginate(7);
        return view('usuarios', ['users' => $users,
                                'order' => 'id'])->with('mensaje', $mensaje);
        
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

        return view('usuarios', ['users' => $users,
                                'order' => 'id'])->with('mensaje', '');;
        
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
            $user->password = bcrypt($request->input('password'));
            $user->privilegios = $request->input('privilegios');
            $user->save();
            $mensaje = "El usuario se ha creado correctamente";
            return redirect()->action('usuariosController@listUsers')->with('mensaje', $mensaje);
        }
        catch(RuntimeException $e){
            $mensaje = "Error al crear el usuario";
            return redirect()->action('usuariosController@listUsers')->with('mensaje', $mensaje);
        }

        catch(QueryException $e){
            $mensaje = "Error al crear el usuario";
            return redirect()->action('usuariosController@listUsers')->with('mensaje', $mensaje);
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
            $user->password = bcrypt($request->input('password'));
            $user->privilegios = $request->input('privilegios');
            $user->save();
            $mensaje = "El usuario con ID " . $id . " se ha modificado con éxito";
            return redirect()->action('usuariosController@listUsers')->with('mensaje', $mensaje);
        }catch(ModelNotFoundException $e){
            $mensaeje = "Ha ocurrido un error al intentar modificar el usuario";
            return redirect()->action('usuariosController@listUsers')->with('mensaje', $mensaje);
        }   
    }

    public function deleteUser(Request $request){
        $mensaje = "";
        try{
            $id = $request->input('id');
            $user = User::findOrFail($id);
            $user->delete();
            $mensaje = "El usuario con ID " . $id . " ha sido borrado con éxito";
            return redirect()->action('usuariosController@listUsers')->with('mensaje', $mensaje);
        }catch (ModelNotFoundException $e){
            $mensaje = "Ha ocurrido un error al intentar borrar el usuario. Vuelve a intentarlo";
            return redirect()->action('usuariosController@listUsers')->with('mensaje', $mensaje);
        }
       
    }

    public function showProfile(Request $request){
        if(Auth::check()){
            $id = Auth::user()->id;
            $categories = Categorysubscription::where('user_id', $id)
               ->get();

            $sources = Sourcesubscription::where('user_id', $id)
               ->get();
            $mensaje = "";
            
            $mensaje = session('mensaje');
            
        return view('perfilUsuario', ['categories' => $categories, 'sources' => $sources])
                                        ->with('mensaje', $mensaje);  
        }
        else{
            return redirect('/login');
        }
    }

    public function editProfile(Request $request){
        $mensaje = "";

        if(($request->input('password') == "") && ($request->input('passwordR') == "")){

          $this->validate($request, [
                'name' => 'min:2',
                'email' => 'required | email',
                'email' => [Rule::unique('users')->ignore(Auth::user()->id)]
            ]);  
                        $id = Auth::user()->id;
            $user = User::findOrFail($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Auth::user()->password;
            $user->privilegios = Auth::user()->privilegios;
            $user->save();
            $mensaje = "Your profile has been updated";
            return redirect()->action('usuariosController@showProfile')->with('mensaje', $mensaje);
        }
        else{
            $this->validate($request, [
                'name' => 'min:2',
                'email' => 'required | email',
                'email' => [Rule::unique('users')->ignore(Auth::user()->id)], 
                'password' => 'min:5|same:repeat_password',
            ]);
                        $id = Auth::user()->id;
            $user = User::findOrFail($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->privilegios = Auth::user()->privilegios;
            $user->save();
            $mensaje = "Your profile has been updated";
            return redirect()->action('usuariosController@showProfile')->with('mensaje', $mensaje);
        }
    }
}
