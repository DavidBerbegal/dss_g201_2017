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
            <div class="flex-center"></div>
            <div class="flex-center"><div>
                 <div>
                      @if($mensaje != "")

                    <div class="flex-center"><h2>{{ $mensaje }}</h2></div>
                @endif</div>
                <div class="flex-center">
                    <br><br></div>
                    <div>
                    

                   <form action="{{ action('articulosController@index')}}" name="sortBy"
                     method="GET">
                    
                    <label for="order">Ordenar articulos por:</label>
                    <select name="order" id='order'>
                        <option selected value="articleid">ID</option>
                        <option value="author">Author</option>
                        <option  value="title">Title</option>
                    </select>
                    <button type="submit" name="sortBy">Ordenar</button>
                </form></div>
                <div class="container">
                <div class="row">
                <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><h4>ID:</h4></th>
                            <th><h4>Author:</h4></th>
                            <th><h4>Title:</h4></th>
                            <th><h4>Description:</h4></th>
                            <th><h4>Date:</h4></th>
                            <th><h4>PositiveRate:</h4></th>
                            <th><h4>NegativeRate:</h4></th>
                            <th><h4>Source:</h4></th>
                            <th><h4>Category:</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(sizeof($articles) == 0)
                        <br>
                        <br>
                        <div><h3>No hay coincidencias para estos criterios de búsqueda</h3></div>
                    @endif
                    
                    @foreach($articles as $art)
                        <tr>
                            <td>{{$art->articleid}}</td>
                            <td>{{$art->author}}</td>
                            <td>{{$art->title}}</td>
                            <td>{{$art->description}}</td>
                            <td>{{$art->date}}</td>
                            <td>{{$art->positiveRate}}</td>
                            <td>{{$art->negativeRate}}</td>
                            <td>{{$art->source}}</td>
                            <td>{{$art->category}}</td>
                                <td>    
                                    <a>
                                        <form action="{{ action('articulosController@delete', ['id' =>  $art->articleid ]) }}" name="delete"
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
                    {{ $articles->appends(['order' => $order])->links() }}
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