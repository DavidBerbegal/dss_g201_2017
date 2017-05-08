<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Modificar Fuente</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/estilos.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body class="bold">
        @if (Route::has('login'))
            <div class="top-right links">
                @if (Auth::check())
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <!--<a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>-->
                @endif
            </div>
        @endif

        <div class="flex-center"><div>
            <div class="title m-b-md">
                Modificar Fuente
            </div>

            <div class="flex-center links">
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ url('/articulos') }}">Artículos</a>
                <a href="{{ url('/usuarios') }}">Usuarios</a>
                <a href="{{ url('/categorias') }}">Categorías</a>
                <a href="{{ url('/fuentes') }}">Fuentes</a>
                <a href="{{ url('/suscripcion-categorias') }}">Suscripción-Categorías</a>
                <a href="{{ url('/suscripcion-fuentes') }}">Suscripción-Fuentes</a>
            </div>
        <hr>
        <br>

        <br>
        <div class="flex-center">
            @if(count($errors) > 0)
                <ul>
                @foreach ($errors->all() as $error)
                    <li> 
                        {{ $error }} 
                    </li>
                @endforeach
                </ul>
            </div>
            @endif

        <div class="flex-center">
            <form action="{{ action('fuentesController@update') }}" name="update"
            method="POST">
            {{ csrf_field() }}
                <table>
                    <tr>
                        <td><label for="id">ID: {{ $id }}</label></td>
                        <td><input type="hidden" name="id" id="id" value= {{ $id }}><br><br></td>
                    </tr>
                    <tr>
                        <td><label for="name">Nombre:</label></td>
                        <td><input type="text" name="name" id="name" value= {{ $name }}><br><br></td>
                    </tr>
                    <tr>
                        <td><label for="description">Descripcion:</label></td>
                        <td><input type="text" name="description" id="description" value= {{ $description }}><br><br></td>
                    </tr>
                </table>
                <div class="flex-center">
                    <button type="submit" class="btn btn-primary" name="update">Guardar</button>
                </div>
            </form>
        </div>
    </body>
</html>