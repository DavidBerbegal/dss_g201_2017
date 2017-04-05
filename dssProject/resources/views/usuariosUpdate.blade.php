<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<<<<<<< 89621d4bfeb10856cceb6a37846816b7bffe25a3
    <head>
=======
   <head>
>>>>>>> Cambios visuales
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<<<<<<< 89621d4bfeb10856cceb6a37846816b7bffe25a3
        <title>Modificar Usuario</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/estilos.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
        
    <body>      
    @if (Route::has('login'))
=======
        <title>Usuarios</title>

        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/estilos.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>  
    <body>
    
            @if (Route::has('login'))
>>>>>>> Cambios visuales
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
            
<<<<<<< 89621d4bfeb10856cceb6a37846816b7bffe25a3
            <div class="flex-center"><div>
                <div class="title m-b-md">
                    <h1>Usuarios</h1>
                </div>
                
                <div class="flex-center links">
=======
            <div class="content">
                

                <div class="links">
>>>>>>> Cambios visuales
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
                

    
    <br>
    
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
            
            <br><div class="flex-center">
            @if(count($errors) > 0)
                <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
                </ul></div>
            @endif

<<<<<<< 89621d4bfeb10856cceb6a37846816b7bffe25a3
            <div class="flex-center"><form action="{{ action('UsersController@updateUser') }}" name="update"
                method="POST">
                {{ csrf_field() }}
                <table>
                    <tr>
                        <td><label for="id">ID del usuario: {{ $id }}</label><br><br></td>
                        <td><input type="hidden" name="id" id="id" value = {{ $id }}></td>
                    </tr>
                    <tr>
                        <td><label for="name">Nombre:</label></td>
                        <td><input type="text" name="name" id="name" value= {{ $name }}><br><br></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td><input type="text" name="email" id="email" value= {{ $email }}><br><br></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password:</label></td>
                        <td><input type="text" name="password" id="password" value= {{ $password }}><br><br></td>
                    </tr>
                </table>
                <div class="flex-center"><button type="submit" name="update">Modificar</button></div>
            </form><div>
=======
        <h3>Modificar usuario</h3>
                <form action="{{ action('UsersController@updateUser') }}" name="update"
                    method="POST">
                    {{ csrf_field() }}
                    <label for="id">ID: {{ $id }}</label><br><br>
                    <input type="hidden" name="id" id="id" value = {{ $id }}>
                    <label for="name">Nombre:  </label>
                    <input type="text" name="name" id="name" value= {{ $name }}><br><br>
                    <label for="email">Email:   </label>
                    <input type="text" name="email" id="email" value= {{ $email }}><br><br>
                    <label for="password">Password:</label>
                    <input type="text" name="password" id="password" value= {{ $password }}><br><br>
                    <button type="submit" name="update">Modificar</button>
                </form>
>>>>>>> Cambios visuales
    </body>
</html>
