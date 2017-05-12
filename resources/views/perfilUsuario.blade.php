<!DOCTYPE html>

<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

            
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/estilos.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <style>

        </style>
    </head>
    <body>
        @extends('header')
        
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <h1>USER PANEL</h1>
                    <h4>Username: {{Auth::user()->name}}</h4>
                    <h4>Email associated: {{Auth::user()->email}}</h4>


                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseCategorias" aria-expanded="false" aria-controls="collapseExample">
                                Show my category subscriptions
                            </a>
                        </p>
                        <div class="collapse" id="collapseCategorias">
                            <div class="card card-block">
                                @foreach($categories as $cat)
                                    <p> {{$cat->category->name}} </p>
                                    
                                @endforeach
                            </div><br><br><br>
                        </div>
                    </div>
                        <div class="col-md-6">
                            <p>
                                <a class="btn btn-primary" data-toggle="collapse" href="#collapseFuentes" aria-expanded="false" aria-controls="collapseExample">
                                    Show my sources subscriptions
                                </a>
                                
                            </p>
                            <div class="collapse" id="collapseFuentes">
                                <div class="card card-block">
                                    @foreach($sources as $src)
                                        <p> {{$src->source->name}} </p>
                                    @endforeach
                                </div><br><br><br>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </body>
</html>