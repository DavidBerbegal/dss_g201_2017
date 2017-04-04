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
                @if(count($errors) > 0)
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                    </ul>
                @endif

        <h3>Crear usuario</h3>
                <form action="{{ action('UsersController@createUser') }}" name="create"
                    method="POST">
                    {{ csrf_field() }}
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name" ><br><br>
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email"><br><br>
                    <label for="password">Password:</label>
                    <input type="text" name="password" id="password"><br><br>
                    <button type="submit" name="create">Crear</button>
                </form>
    </body>
</html>
