<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nuevo Comentario</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/estilos.css">
        <link rel="stylesheet" type="text/css" href="/css/foro.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
    @extends('header')
        <div class="flex-center"><div>
            <div class="title m-b-md">
                Nuevo Comentario
            </div>
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
        <br>
        <div class="flex-center">
            <form action=" {{ action('foroController@create') }}" name="create"
                method="POST">
                {{ csrf_field() }}
                <table>
                    <tr>
                        <td><label for="titulo">Título:</label></td>
                        <td><input class="textbox" type="text" name="titulo" id="titulo" style="width: 300px; "></td>
                    </tr>
                    <tr>
                        <td><label for="comentario">Comentario:</label></td>
                        <td>
                            <textarea cols="20" rows="10" class="textbox" name="comentario" id="comentario" style="margin-top: 10px; height: 150px; width: 300px"></textarea>
                        </td>
                    </tr>
                </table>
                <div class="flex-center">
                    <button type="submit" class="btn btn-primary" name="create" style="margin-top: 10px">Guardar</button>
                </div>
            </form>
        </div>
    </body>
</html>