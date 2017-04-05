<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fuentes</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/estilos.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
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

            <div class="content-fuentes">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><h4>ID:</h4></th>
                            <th><h4>Nombre:</h4></th>
                            <th><h4>Acción:</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($fuentes as $mostrarFuente)
                        <tr>
                            <td>{{$mostrarFuente->id}}</td>
                            <td>{{$mostrarFuente->name}}</td>
                            <td>
                                <a class="operations-icon" onmouseover="" style="cursor: pointer;">"Modificar"</a>
                                <form action="{{ action('controllerSources@destroy')}}" name="delete"
                                    method="POST">
                                    {{ csrf_field() }}
                                    <!--<input type="text" name="id" id="id"> -->
                                    <button type="submit" name="delete">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    <div class="botonAgregar">
        <h3>Crear Fuente</h3>
            <a href="{{ url('/fuentes/nuevaFuente')}}">Crear Fuente</a>
    </div>
    <!--
    <footer>
        <div class="footer">
            <p>DSS 2016-17</p>
        </div>
    </footer>
    -->
</html>
