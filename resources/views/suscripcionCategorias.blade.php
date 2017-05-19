<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/estilos.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
    <br><br>
         @extends('header')
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
            <br>
            <div class="flex-center"><div>
                 <div>
                
                 @if($mensaje != "")

                    <div class="flex-center"><h2>{{ $mensaje }}</h2></div>
                @endif
                
                 <div class="flex-center">
                <br><br></div>
                <div>
                   <form action="{{ action('suscripcionCategoriasController@index')}}" name="sortBy"
                     method="GET">
                    
                    <label for="order">Ordenar suscripciones por:</label>
                    <select name="order" id='order'>
                        <option selected value="subid">ID</option>
                        <option value="user">User</option>
                        <option  value="category">Category</option>
                    </select>
                    <button type="submit" name="sortBy">Ordenar</button>
                </form>

                 <div class="container">
                <div class="row">
                <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><h4>ID:</h4></th>
                            <th><h4>User:</h4></th>
                            <th><h4>Category:</h4></th>
                            <th><h4>Acción:</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(sizeof($categorysubscriptions) == 0)
                        <br>
                        <br>
                        <div><h3>No hay coincidencias para estos criterios de búsqueda</h3></div>
                    @endif
                    
                    @foreach($categorysubscriptions as $sub)
                        <tr>
                            <td>{{$sub->subid}}</td>
                            <td>{{$sub->user}}</td>
                            <td>{{$sub->category}}</td>
                                <td>    
                                    <a>
                                        <form action="{{ action('suscripcionCategoriasController@delete', ['id' =>  $sub->subid ]) }}" name="delete"
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
                    {{ $categorysubscriptions->appends(['order' => $order])->links() }}
                </div>

            </div>
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