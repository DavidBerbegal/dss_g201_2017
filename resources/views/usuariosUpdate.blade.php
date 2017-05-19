<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Modificar Usuario</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/estilos.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
        
    <body>  
    @extends('header')   
            <div class="flex-center"><div>
                    <br>            
            <br><div class="flex-center">
            @if(count($errors) > 0)
                <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
                </ul></div>
            @endif

            <div class="flex-center"><form action="{{ action('usuariosController@updateUser') }}" name="update"
                method="POST">
                {{ csrf_field() }}
                <table>
                    <tr>
                        <td><label for="id">ID del usuario: {{ $id }}</label><br><br></td>
                        <td><input type="hidden" name="id" id="id" value = {{ $id }}></td>
                    </tr>
                    <tr>
                        <td><label for="name">Nombre:</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="name" id="name" value= {{ $name }}><br><br></td>
                        
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="email" id="email" value= {{ $email }}><br><br></td>
                        
                    </tr>
                    <tr>
                        <td><label for="password">Password:</label>&nbsp&nbsp&nbsp<input type="text" name="password" id="password" value= {{ $password }}><br><br></td>
                        
                    </tr>
                    <tr>
                        <td>
                            <label for="privilegios">Privilegios:</label>&nbsp&nbsp<select name=privilegios id='privilegios'>
                                <option selected value="usuario">Usuario</option>
                                @if(Auth::user()['privilegios'] == "administrador")
                                    <option value="administrador">Administrador</option>
                                @endif
                            </select>
                        </td>
                                            
                            </tr>
                </table>
                <br><div class="flex-center"><button type="submit" class="btn btn-primary" name="update">Guardar</button></div>
            </form><div>

    </body>
</html>
