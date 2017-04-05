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
                    Nueva Fuente
                </div>

                <div class="links">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/articulos') }}">Artículos</a>
                    <a href="{{ url('/usuarios') }}">Usuarios</a>
                    <a href="{{ url('/categorias') }}">Categorías</a>
                    <a href="{{ url('/suscripcion-categorias') }}">Suscripción-Categorías</a>
                    <a href="{{ url('/suscripcion-fuentes') }}">Suscripción-Fuentes</a>
                </div>
            </div>
        </div>
    </body>
    <table class="table table-hover">
        <tr>
            <td><h4>Nombre:</h4></td>
            <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td><h4>Descripción:</h4></td>
            <td><input type="text" name="description" id="description"></td>
        </tr>
        <tr>
            <td><h4>Url:</h4></td>
            <td><input type="text" name="url" id="url"></td>
        </tr>
    </table>
    <p>
        <input type="submit" class="btn btn-primary" value="Guardar"></input>
        <button class="btn btn-primary" href="/fuentes">Cancelar</button>
    </p>
    <!--
    <footer>
        <div class="footer">
            <p>DSS 2016-17</p>
        </div>
    </footer>
    -->
</html>