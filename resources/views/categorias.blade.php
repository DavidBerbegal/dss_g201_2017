<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Categorías</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/estilos.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        </head>

        <body>
        <br><br>
            <div class="flex-center">
                @if (session('mensaje'))
                    @if (session('mensaje') != "")
                        <div class="flex-center"><h2>{{session('mensaje')}}</h2></div>
                    @endif
                @endif </div>
            <div class="flex-center"><div>
                <div style="text-align:center">
                    <div>
                        <p align="center">
                            <a href="{{ url('/nuevaCategoria')}}" class="btn btn-primary" role="button">Nueva Categoría</a>
                        </p>
                    </div>
                </div>
                
                 <div class="flex-center">
                <br><br></div>
                <div>


                <form action="{{ action('categoriasController@listCategories')}}" name="sortBy"
                     method="GET">
                    
                    <label for="order">Ordenar categorías por:</label>
                    <select name="order" id='order'>
                        <option selected value="id">ID</option>
                        <option value="name">Nombre</option>
                    </select>
                    <button type="submit" name="sortBy">Ordenar</button>
                </form>  
                </div>
    
    
        <!-- @extends('header')
        <div class="aux flex-center position-ref full-height">
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
                    @foreach($categorias as $mostrarCategoria)
                        <tr>
                            <td>{{$mostrarCategoria->id}}</td>
                            <td>{{$mostrarCategoria->name}}</td>
                                <td class="botones">
                                    <a href="{{ action('categoriasController@showCategory', ['id' =>  $mostrarCategoria->id ]) }}">
                                        <button type="submit" name="edit">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </a> 
                       
                                    <a>
                                        <form action="{{ action('categoriasController@destroy', ['id' =>  $mostrarCategoria->id ]) }}" name="delete"
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
                    {{ $categorias->links() }}
                </div>
            </div>
        </div>
    </body>
</html>