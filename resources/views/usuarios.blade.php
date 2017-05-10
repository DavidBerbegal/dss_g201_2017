<!DOCTYPE html>

<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

           
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/estilos.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <div class="links">
                <a href="{{ url('/articulos') }}">Artículos</a>
                <a href="{{ url('/fuentes') }}">Fuentes</a>
                <a href="{{ url('/categorias') }}">Categorías</a>
                <a href="{{ url('/suscripcion-categorias') }}">Suscripción-Categorías</a>
                <a href="{{ url('/suscripcion-fuentes') }}">Suscripción-Fuentes</a>
        </div>

    </head>
    
    <body>
    <!--Añadir esta linea para incluir pagina maestra!-->
    @extends('header')
    <br><br><br>
                 @if($mensaje != "")

                    <div class="flex-center"><h2>{{ $mensaje }}</h2></div>
                @endif
                <div class="flex-center"><div>

                <div class="flex-center">
                <a href="{{ url('/usuariosCreateUpdate') }}"><span class="glyphicon glyphicon-plus">
                    </span>Crear nuevo usuario
                </a><br><br></div>
                <div>
                    
                   <form action="{{ action('usuariosController@listUsers')}}" name="sortBy"
                     method="GET">
                    
                    <label for="order">Ordenar usuarios por:</label>
                    <select name="order" id='order'>
                        <option selected value="id">ID</option>
                        <option value="name">Nombre</option>
                        <option  value="email">Email</option>
                    </select>
                    <button type="submit" name="sortBy">Ordenar</button>
                </form>
                
                <h3>Buscar usuario</h3><form action="{{ action('usuariosController@searchUser')}}" name="search"
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
                            <th><h4>Privilegio:</h4></th>
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
                            <td>{{$usuario->privilegios}}</td>
                            
                            <td><a href="{{ action('usuariosController@showUser', ['id' =>  $usuario->id ]) }}">
                            <span class="glyphicon glyphicon-pencil"></span></a></td>
                            <td><a href="{{ action('usuariosController@deleteUser', ['id' =>  $usuario->id ]) }}">
                            <span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="flex-center">
                    {{ $users->appends(['order' => $order])->links() }}
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
