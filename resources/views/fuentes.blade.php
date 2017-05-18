<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/estilos.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        </head>
        <body>
        <br><br>
        <div class="flex-center"><div>
                 <div>
        @if($mensaje != "")
        <div class="flex-center"><h2> {{ $mensaje }} </h2></div>
        @endif
        <div class="flex-center"><div>
        <div style="text-align:center">
            <div>
                <p align="center">
                    <a href="{{ url('/nuevaFuente')}}" class="btn btn-primary" role="button">Nueva Fuente</a>
                </p>
            </div>
        </div>

          <div class="flex-center">
                <br><br></div>
                <div>

        <form action="{{ action('fuentesController@listSources')}}" name="sortBy"
                method="GET">
            <label class="ordenar-label" for="order">Ordenar fuentes por:</label>
            <select name="order" id='order'>
                <option selected value="id">ID</option>
                <option value="name">Nombre</option>
            </select>
            <button type="submit" name="sortBy">Ordenar</button>
        </form>
        </div> 
        
         @extends('header')
        <!--<div class="aux flex-center position-ref full-height">
            <div class="content-fuentes">-->
                <div class="container">
                <div class="row">
                <div class="col-md-12">
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
                                <a href="{{ action('fuentesController@showSource', ['id' => $mostrarFuente->id ])}}">
                                    <button type="submit" name="edit">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
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
                </div>
                </div>
                </div>

                <div class="flex-center">
                    {{ $fuentes->appends(['order' => $order])->links() }}
                </div>
            </div>
        </div>
    </body>
</html>