<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

    <head>


        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Nueva categoría</title>

        

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/estilos.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
    @extends('header')
            <div class="flex-center"><div>
                <div class="title m-b-md">
                    <h2>Nueva Categoría</h2>
                </div>
                <hr>
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

        <br>
        <div class="flex-center">
        <form action="{{ action('categoriasController@create') }}" name="create"
            method="POST">
            {{ csrf_field() }}
            <table>
                <tr>
                    <td><label for="name">Nombre: </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="name" id="name" ><br><br></td>
                    
                </tr>
                <tr>
                    <td><label for="description">Descripción: </label>&nbsp&nbsp<input type="text" name="description" id="description"></td>
                <tr>
            </table>
            <br><div class="flex-center"><button type="submit" class="btn btn-primary" name="create">Crear categoría</button></div>
        </form></div>

    </body>
</html>
