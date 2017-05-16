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

        @if($mensaje != "")
        <div class="flex-center">
            <h2> 
                {{ $mensaje }} 
            </h2>
        </div>
        @endif

        <form class="form-class" action="{{ action('fuentesController@listSources')}}" name="sortBy"
                method="GET">
            <label class="ordenar-label" for="order">Ordenar fuentes por:</label>
            <select class="bold" name="order" id='order'>
                <option selected value="id">ID</option>
                <option value="name">Nombre</option>
            </select>
            <button class="bold" type="submit" name="sortBy">Ordenar</button>
        </form> 
    </head>
    <body>
         @extends('header')
        <div class="aux flex-center position-ref full-height">
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
                            <td class="botones">
                                <a type="button" class="btn btn-default" href="{{ action('fuentesController@showSource', ['id' => $mostrarFuente->id ])}}">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a>
                                    <form action="{{ action('fuentesController@destroy', ['id' => $mostrarFuente->id ])}}" name="delete"
                                        method="POST">
                                        {{ csrf_field() }}
                                        
                                        <button type="submit" name="delete">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    </form>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $fuentes->appends(['order' => $order])->links() }}
                </div>
            </div>
        </div>
    </body>
    <div class="botonAgregar">
        <a type="button" class="btn btn-default" href="{{ url('/nuevaFuente')}}">
            <span class="glyphicon glyphicon-plus"></span>
        </a>
    </div>
</html>