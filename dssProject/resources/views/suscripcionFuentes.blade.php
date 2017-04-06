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
            <br>
            <div class="flex-center"><div>
                
                <div class="flex-center links">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/fuentes') }}">Fuentes</a>
                    <a href="{{ url('/articulos') }}">Artículos</a>
                    <a href="{{ url('/usuarios') }}">Usuarios</a>
                    <a href="{{ url('/categorias') }}">Categorías</a>
                    <a href="{{ url('/suscripcion-categorias') }}">Suscripción-Categorías</a>
                    <a href="{{ url('/suscripcion-fuentes') }}">Suscripción-Fuentes</a>
                </div>
                 <div>
                    <hr>
                 @if($mensaje != "")

                    <div class="flex-center"><h2>{{ $mensaje }}</h2></div>
                @endif
                <div class="flex-center"><div>
                   <form action="{{ action('suscripcionFuentesController@index')}}" name="sortBy"
                     method="GET">
                    
                    <label for="order">Ordenar suscripciones por:</label>
                    <select name="order" id='order'>
                        <option selected value="id">ID</option>
                        <option value="user_id">UserID</option>
                        <option  value="source_id">SourceID</option>
                    </select>
                    <button type="submit" name="sortBy">Ordenar</button>
                </form>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><h4>ID:</h4></th>
                            <th><h4>UserID:</h4></th>
                            <th><h4>SourceID:</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(sizeof($sourcesubscriptions) == 0)
                        <br>
                        <br>
                        <div><h3>No hay coincidencias para estos criterios de búsqueda</h3></div>
                    @endif
                    
                    @foreach($sourcesubscriptions as $sub)
                        <tr>
                            <td>{{$sub->id}}</td>
                            <td>{{$sub->user_id}}</td>
                            <td>{{$sub->source_id}}</td>
                            
                                <td>    
                                    <a>
                                        <form action="{{ action('suscripcionFuentesController@delete', ['id' =>  $sub->id ]) }}" name="delete"
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
                <div class="flex-center">
                    {{ $sourcesubscriptions->appends(['order' => $order])->links() }}
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