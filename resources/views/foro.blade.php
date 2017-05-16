<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>Foro</title>
      <meta name="feed" content="width=device-width, initial-scale=1">
      
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="/css/estilos.css">
      <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
      <link rel="stylesheet" type="text/css" href="/css/foro.css">
  </head>
  <body>
      @extends('header')

      <div class="container" id="tourpackages-carousel">
      <br>
      @if(sizeof($foro) == 0)
        <div><h3 align="center">There are no matches for these search parameters</h3>
        <p align="center"><a href="/feed" class="btn btn-primary" role="button">Back</a></p></div>
      @endif
      <div style="text-align:center">
        <div>
            <p align="center">
                <a href="/nuevoForo" class="btn btn-primary" role="button">Nuevo Mensaje</a>
            </p>
        </div>
    </div>
      <div class="row">
          @foreach($foro as $mensaje)
          <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
                <table>
                    <tr>
                        <td><p align="justify">{{$mensaje->created_at}}</p></td>
                        <td><p style="margin-left: 100px"> {{$mensaje->autor}} </p></td>
                        <td>
                            <p>
                                @if(Auth::user()['privilegios'] == "administrador")
                                    <a>
                                        <form action="{{ action('foroController@destroy', ['id' => $mensaje->id ])}}" name="delete"
                                            method="POST">
                                            {{ csrf_field() }}
                                            
                                            <button type="submit" name="delete">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </form>
                                    </a>
                                @endif
                            </p>
                        </td>
                    </tr>
                </table>
              <div>
                </div>
                <div class="caption">
                  <h3 align="left">{{$mensaje->titulo}}</h4>
                  <p align="justify">{{$mensaje->comentario}}</p>
              </div>
            </div>
          </div>
          @endforeach
      </div><!-- End container -->
    <div class="flex-center">
        {{ $foro->appends(['order' => $order])->links() }}
    </div>
  </body>
</html>