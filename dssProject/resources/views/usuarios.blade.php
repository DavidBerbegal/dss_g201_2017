<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
            
            <div class="content">
                <div class="title m-b-md">
                    Fuentes
                </div>

                <div class="links">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/articulos') }}">Artículos</a>
                    <a href="{{ url('/usuarios') }}">Usuarios</a>
                    <a href="{{ url('/categorias') }}">Categorías</a>
                    <a href="{{ url('/suscripcion-categorias') }}">Suscripción-Categorías</a>
                    <a href="{{ url('/suscripcion-fuentes') }}">Suscripción-Fuentes</a>
                </div>
                <br>
                @if($mensaje != "")
                    {{ $mensaje }}
                @endif
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><h4>ID:</h4></th>
                            <th><h4>Name:</h4></th>
                            <th><h4>Email:</h4></th>
                            <th><h4>Password:</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $usuario)
                        <tr>
                            <td>{{$usuario->id}}</td>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->password}}</td>
                            
                            <td><a href="{{ action('UsersController@showUser', ['id' =>  $usuario->id ]) }}">Modificar</a></td>
                            <!--td><a href="{{ action('UsersController@deleteUser', ['id' =>  $usuario->id ]) }}">Borrar</a></td>
                        !--></tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $users->links() }}
                </div>
                <h3>Borrar usuario</h3><br><br>
                <form action="{{ action('UsersController@deleteUser') }}" name="delete"
                    method="POST">
                    {{ csrf_field() }}
                    <label for="id">ID del user a borrar:</label>
                    <input type="text" name="id" id="id">
                    <button type="submit" name="delete">Borrar</button>
                </form>
                <br>
                <h3>Crear usuario</h3>
                <a href="{{ url('/usuariosCreateUpdate') }}">Crear un usuario</a>
     
    </body>
    <!--
    <footer>
        <div class="pie">
            <p>DSS 2016-17</p>
        </div>
    </footer>
    -->
</html>