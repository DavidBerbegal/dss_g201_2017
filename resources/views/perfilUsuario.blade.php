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
        
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                        <h5>There are some mistakes in the data you provided:</h5>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('mensaje'))
                        <div class="alert alert-success" role="alert">{{session('mensaje')}}</div>
                    @endif
                    <h1>USER PANEL</h1>
                    <h4>Username: {{Auth::user()->name}}</h4>
                    <h4>Email associated: {{Auth::user()->email}}</h4>
                    <p>
                        <a class="btn btn-primary" data-toggle="collapse" href="#collapseEdit" aria-expanded="false" aria-controls="collapseExample">
                            Edit my account
                        </a>
                    </p>
                    <div class="collapse" id="collapseEdit">
                         <div class="card card-block">
                             <div><form action="{{ action('usuariosController@editProfile') }}" name="update"
                                method="GET">
                                {{ csrf_field() }}
                                <table>
                    
                                    <tr>
                                        <td><label class="left"  for="name">Username:</label><input type="text" class="left" name="name" id="name" value= {{ Auth::user()->name }}></td>
                                        <td><br><br></td>
                                    </tr>
                                    <tr>
                                        <td><label class="left" for="email">Email:</label><input type="text" class="left" name="email" id="email" value= {{ Auth::user()->email }}></td>
                                        <td><br><br></td>
                                        <br>
                                    </tr>
                                    <tr>
                                        <td><label class="left" for="password">New password:</label><input type="password" class="left" name="password" id="password" value=""></td>
                                        <td><br><br></td>
                                    </tr>
                                    <tr>
                                        <td><label class="left" for="repeat_password">Repeat password:</label><input type="password" class="left" name="repeat_password" id="repeat_password" value=""></td>
                                        <td><br><br></td>
                                    </tr>
                                </table>
                                <br>
                                <div><button class="btn btn-success" type="submit" name="update">Save changes</button></div>
                            </form>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="row">
                
                    <div class="col-md-6">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseCategorias" aria-expanded="false" aria-controls="collapseExample">
                                Show my category subscriptions
                            </a>
                        </p>
                        <div class="collapse" id="collapseCategorias">
                            <div class="card card-block">
                                    @if(count($categories) == 0)
                                        You don't have subscriptions to any categories
                                    @endif

                                    @foreach($categories as $cat)
                                        <?php 
                                            $str = '/buscaCategoria/' . $cat->category_id;
                                        ?>
                                        <a href="{{ action('suscripcionCategoriasController@deletePub', ['user_id' =>  Auth::user()->id,
                                                                 'category_id' => $cat->category_id ]) }}">
                                        <span class="glyphicon glyphicon-remove"></span></a>
                                        <a href={{$str}}> {{$cat->category->name}} </a><br>
                                    
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
                                    @if(count($sources) == 0)
                                        You don't have subscriptions to any sources
                                    @endif
                                    @foreach($sources as $src)
                                        <a href="{{ action('suscripcionFuentesController@deletePub', ['user_id' =>  Auth::user()->id,
                                                                 'source_id' => $src->source_id ]) }}">
                                        <span class="glyphicon glyphicon-remove"></span></a>
                                         {{$src->source->name}} <br>
                                    @endforeach
                                </div><br><br><br>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </body>
</html>