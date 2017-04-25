<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">

    <head>


        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Usuarios</title>

        

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/estilos.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(Auth::check()): ?>
                        <a href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(url('/login')); ?>">Login</a>
                        <a href="<?php echo e(url('/register')); ?>">Register</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            

            <div class="flex-center"><div>
                <div class="title m-b-md">
                    <h2>Nueva Categoría</h2>
                </div>
                
                <div class="flex-center links">

                    <a href="<?php echo e(url('/')); ?>">Home</a>
                    <a href="<?php echo e(url('/articulos')); ?>">Artículos</a>
                    <a href="<?php echo e(url('/usuarios')); ?>">Usuarios</a>
                    <a href="<?php echo e(url('/categorias')); ?>">Categorías</a>
                    <a href="<?php echo e(url('/fuentes')); ?>">Fuentes</a>
                    <a href="<?php echo e(url('/suscripcion-categorias')); ?>">Suscripción-Categorías</a>
                    <a href="<?php echo e(url('/suscripcion-fuentes')); ?>">Suscripción-Fuentes</a>
                </div>
                
                <br>
               _________________________________________________________________________________________________________________________________________________________________________
                <br>
    
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(Auth::check()): ?>
                        <a href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(url('/login')); ?>">Login</a>
                        <a href="<?php echo e(url('/register')); ?>">Register</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            

                
                <br><div class="flex-center">
                <?php if(count($errors) > 0): ?>
                    <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li> <?php echo e($error); ?> </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul></div>
                <?php endif; ?>

        <br>
        <div class="flex-center">
        <form action="<?php echo e(action('categoriasController@create')); ?>" name="create"
            method="POST">
            <?php echo e(csrf_field()); ?>

            <table>
                <tr>
                    <td><label for="name">Nombre: </label></td>
                    <td><input type="text" name="name" id="name" ><br><br></td>
                </tr>
                <tr>
                    <td><label for="description">Descripción: </label></td>
                    <td><input type="text" name="description" id="description"><br><br></td>
                <tr>
            </table>
            <div class="flex-center"><button type="submit" name="create">Crear Categoría</button></div>
        </form></div>

    </body>
</html>
