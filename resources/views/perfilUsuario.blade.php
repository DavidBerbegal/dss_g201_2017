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
            .left{
                width: 50%;
                float: left;
                text-align: left;
            }

            .right{
                width: 65%;
                margin-left: 5px;
                float:left;
            }

        </style>
    </head>
    <body>
        @extends('header')      
        <div class="container">
        <div class="row">
        <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
        <br>
            <p class=" text-info"></p>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
            <div class="panel panel-info">
                <div class="panel-heading">
                <h3 class="panel-title"> {{ Auth::user()->name }} </h3>
                </div>
                <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://www.galerie-am-leewasser.ch/wp-content/uploads/2015/12/profil.png" class="img-circle img-responsive"> </div>
                    <div class=" col-md-9 col-lg-9 "> 
                    <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <td>Email associated: </td>
                                <td> {{ Auth::user()->email }} </td>
                            </tr>
                            <tr>
                                <td>Privilegios: </td>
                                <td>{{ Auth::user()->privilegios }}</td>
                            </tr>                        
                        </tbody>
                    </table>
                    <li class="dropdown"><a data-toggle="dropdown" class="btn btn-primary" href="#">Categories<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @if(count($categories) == 0)
                                <li><a href="#">No Results</a></li>
                            @endif

                            @foreach($categories as $cat)
                                <?php 
                                    $str = '/buscaCategoria/' . $cat->category_id;
                                ?>
                                <a href="{{ action('suscripcionCategoriasController@deletePub', ['user_id' =>  Auth::user()->id,
                                    'category_id' => $cat->category_id ]) }}" class="glyphicon glyphicon-remove"> {{$cat->category->name}} </a>
                                </a>
                                <br>
                            @endforeach
                        </ul>
                    </li>

                    <a>
                        <p></p>
                    </a>

                    <li class="dropdown"><a data-toggle="dropdown" class="btn btn-primary" href="#">Sources<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @if(count($sources) == 0)
                                <li><a href="#">No Results</a></li>
                            @endif

                            @foreach($sources as $src)
                                <a href="{{ action('suscripcionFuentesController@deletePub', ['user_id' =>  Auth::user()->id,
                                        'source_id' => $src->source_id ]) }}" style="margin-top: 10px;" class="glyphicon glyphicon-remove">{{$src->source->name}}</a>
                                </a>
                                <br>
                            @endforeach
                        </ul>
                    </li>
                    </div>
                </div>
                </div>
                    <div class="panel-footer">
                        <a href="{{ action('usuariosController@showUser', ['id' =>  Auth::user()->id ]) }}" data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{{ action('usuariosController@deleteUser', ['id' =>  Auth::user()->id ]) }}" data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-trash"></i></a>

                 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>