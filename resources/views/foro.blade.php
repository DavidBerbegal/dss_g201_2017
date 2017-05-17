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
      <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  </head>
  <body>
      @extends('header')
        <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="btn-panel btn-panel-conversation">
                </div>
            </div>

            <div class="col-lg-offset-1 col-lg-7">
                <div class="btn-panel btn-panel-msg">
                    <a href="/nuevoForo" class="btn  col-lg-3  send-message-btn pull-right" role="button"><i class="fa fa-gears"></i> Nuevo Comentario</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="message-wrap col-lg-8">
            @foreach($foro as $mensaje)
                <div class="msg-wrap">
                    <div class="media msg ">
                        <a class="pull-left" href="#">
                            @if(Auth::user()['privilegios'] == "administrador")
                                <form action="{{ action('foroController@destroy', ['id' => $mensaje->id ])}}" name="delete"
                                    method="POST">
                                    {{ csrf_field() }}
                                    
                                    <button type="submit" name="delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </form>
                            @endif
                        </a>
                        <div class="media-body">
                            <small class="pull-right time"><i class="fa fa-clock-o"></i>{{$mensaje->created_at}}</small>
                            <h5 class="media-heading">{{$mensaje->autor}}</h5>
                            <strong>{{$mensaje->titulo}}</strong>
                            <small class="col-lg-10">{{$mensaje->comentario}}</small>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="send-wrap ">
                </div>
                <div class="btn-panel">
                    {{ $foro->appends(['order' => $order])->links() }}
                </div>
            </div>
        </div>
    </div>
  </body>
</html>