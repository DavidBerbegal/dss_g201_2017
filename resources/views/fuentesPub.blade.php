<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
      <title>Sources</title>
      <meta name="fuentesPub" content="width=device-width, initial-scale=1">
      
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="/css/estilos.css">
      <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
      <style type="text/css">
          @import url(http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,700,400italic);

          font-family: 'Open Sans', sans-serif;

          html {
          font-family: 'Open Sans', sans-serif;
          }

          body {
          padding-top: 100px;
          font-family: 'Open Sans', sans-serif;
          }

          .thumbnail {
              position: relative;
              padding: 0px;
              margin-bottom: 20px;
              height: 270px;

          }
          #header-content {
            position: absolute;
            bottom: 0px;
            right: 20%;
          }

      </style>
      <!--<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
      !-->
  </head>
  <body>
      <!--Añadir esta linea para incluir pagina maestra!-->
      @extends('header')
        <div class="flex-center">
          @if (session('mensaje'))
              @if (session('mensaje') != "")
                  <div class="alert alert-success" role="alert">{{session('mensaje')}}</div>
              @endif
          @endif
        </div>
      <!--<script>
        location.hash = "#HOLA"
      </script>!-->
      <div class="container" id="tourpackages-carousel">
      <h1 align="center" style="color:gray;">Our sources</h1>
      <h4 align="justify">Below is a list that contains all the sources from which we receive the news we use. If you are interested in a particular source, you can subscribe to it to see their news in your feed. To do this, you need to be logged in
          and find the source that interests you, then click on its subscribe button.</h4>
      <h2 style="color:gray">Search sources:</h2>
      <div class="row">

        <div class="col">
          <form action="{{ action('fuentesController@searchPubSources')}}" name="search"
                     method="GET">
            <div class="input-group">
                <input type="text" name="sName" id="sName" class="form-control" placeholder="Search sources...">
                <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
                </button>
              </div>
            </div>
          </form>

      </div>
      <br>
      @if(sizeof($fuentes) == 0)
        <div><h3 align="center">There are no matches for these search parameters</h3>
        <p align="center"><a href="/fuentesPub" class="btn btn-primary" role="button">Back</a></p></div>
      @endif
      <div class="row">
          @foreach($fuentes as $fuente)
          <div class="col-xs-18 col-sm-6 col-md-4">
            <div class="thumbnail">
                <div class="caption">
                  <h3 align="center">{{$fuente->name}}</h4>
                  <p align="justify">{{$fuente->description}}</p>
                  <div id="header-content">
                      <p align="center">
                        @if(Auth::check())
                          @if(in_array($fuente->id, $subs))
                            <a href="{{ action('suscripcionFuentesController@desuscribe', ['source_id' =>  $fuente->id ]) }}" class="btn btn-danger btn-xs" role="button">Unsuscribe</a>
                          @else
                            <a href="{{ action('suscripcionFuentesController@addPub', ['source_id' =>  $fuente->id ]) }}" class="btn btn-success btn-xs" role="button">Suscribe</a>
                          @endif
                        @endif
                        <a href="{{$fuente->url}}" target="_blank" class="btn btn-primary btn-xs" role="button">Go to the site 
                        </a>         
                      </p>
                  </div>
              </div>
            </div>
          </div>
          @endforeach
      </div><!-- End container -->
      <div id ="HOLA"></div>
  </body>
</html>