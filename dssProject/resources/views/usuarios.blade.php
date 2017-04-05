<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Usuarios</title>

        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/estilos.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    
    <body>
        
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
            
            <div class="flex-center"><div>
                <div class="title m-b-md">
                    <h1>Usuarios</h1>
                </div>
                
                <div class="flex-center links">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/fuentes') }}">Fuentes</a>
                    <a href="{{ url('/articulos') }}">Artículos</a>
                    <a href="{{ url('/usuarios') }}">Usuarios</a>
                    <a href="{{ url('/categorias') }}">Categorías</a>
                    <a href="{{ url('/suscripcion-categorias') }}">Suscripción-Categorías</a>
                    <a href="{{ url('/suscripcion-fuentes') }}">Suscripción-Fuentes</a>
                </div>
                
                <br>
               _________________________________________________________________________________________________________________________________________________________________________
                @if($mensaje != "")

                    <div class="flex-center"><h2>{{ $mensaje }}</h2></div>
                @endif
                <div class="flex-center"><div>

                <h3>Crear usuario</h3>
                <a href="{{ url('/usuariosCreateUpdate') }}">Crear un usuario</a><br><br>
                <div>
                    
                   <form action="{{ action('UsersController@listUsers')}}" name="sortBy"
                     method="GET">
                    {{ csrf_field() }}
                    <label for="order">Ordenar usuarios por:</label>
                    <select name="order" id='order'>
                        <option selected value="id">ID</option>
                        <option value="name">Nombre</option>
                        <option  value="email">Email</option>
                    </select>
                    <button type="submit" name="sortBy">Ordenar</button>
                </form>
                
                <h3>Buscar usuario</h3><form action="{{ action('UsersController@searchUser')}}" name="search"
                     method="POST">
                    {{ csrf_field() }}
                    <label for="sName">Nombre:</label>
                    <input type="text" name="sName" id="sName">
                    <label for="sEmail">Email:</label>
                    <input type="text" name="sEmail" id="sEmail">
                    <button type="submit" name="buscar">Buscar</button>
                </form></div>

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
                    @if(sizeof($users) == 0)
                        <br>
                        <br>
                        <div><h3>No hay coincidencias para estos criterios de búsqueda</h3></div>
                    @endif
                    
                    @foreach($users as $usuario)
                        <tr>
                            

                            <td>{{$usuario->id}}</td>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->password}}</td>
                            
                            <td><a href="{{ action('UsersController@showUser', ['id' =>  $usuario->id ]) }}">Modificar</a></td>
                            <td><a href="{{ action('UsersController@deleteUser', ['id' =>  $usuario->id ]) }}">Borrar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="flex-center">
                    {{ $users->appends(['order' >= $sort])->links() }}
                </div>
                
     
    </body>
    <!--
    <footer>
        <div class="pie">
            <p>DSS 2016-17</p>
        </div>
    </footer>
    -->
</html>
