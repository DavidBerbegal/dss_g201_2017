<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
      <title>Feed</title>
      <meta name="feed" content="width=device-width, initial-scale=1">
      
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

          .thumbnail > img {
              margin-left: auto;
              margin-right: auto;
              min-height: 260px;
          }

          .thumbnail {
              height: auto;
              position: relative;
              padding: 0px;
              margin-bottom: 20px;
              height: 600px;
          }
          .article-container {
            width: 33%;
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

      <div class="container" id="tourpackages-carousel">
      <h2 style="color:gray">Search article:</h2>
      <div class="row">

        <div class="col">
          <form action="{{ action('articulosController@searchFeed')}}" name="search"
                     method="GET">
            <div class="input-group">
                <input type="text" name="sName" id="sName" class="form-control" placeholder="Search article...">
                <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
                </button>
              </div>
            </div>
          </form>

      </div>
      <br>
      @if(sizeof($articles) == 0)
        <div><h3 align="center">There are no matches for these search parameters</h3>
        <p align="center"><a href="/feed" class="btn btn-primary" role="button">Back</a></p></div>
      @endif
      <div class="row">
          @foreach($articles as $art)
          <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
              <img src="{{$art->urlImg}}" alt="">
                <div class="caption">
                  <h3 align="left">{{$art->title}}</h4>
                  <p align="justify">{{$art->description}}</p>
                  <div id="header-content">
                    <p align="center">
                      <a href="{{$art->urlNew}}" target="_blank" class="btn btn-primary btn-xs" role="button">Go to source 
                      </a>
                    </p>
                  </div>
              </div>
            </div>
          </div>
          @endforeach
      </div><!-- End container -->
  </body>
</html>