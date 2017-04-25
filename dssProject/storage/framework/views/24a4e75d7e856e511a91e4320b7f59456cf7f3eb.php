<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Portal de noticias</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/estilos.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
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

            <div class="content">
                <div class="title m-b-md">
                    Portal de noticias
                </div>

                <div class="links">
                    <a href="<?php echo e(url('/')); ?>">Home</a>
                    <a href="<?php echo e(url('/articulos')); ?>">Artículos</a>
                    <a href="<?php echo e(url('/usuarios')); ?>">Usuarios</a>
                    <a href="<?php echo e(url('/categorias')); ?>">Categorías</a>
                    <a href="<?php echo e(url('/fuentes')); ?>">Fuentes</a>
                    <a href="<?php echo e(url('/suscripcion-categorias')); ?>">Suscripción-Categorías</a>
                    <a href="<?php echo e(url('/suscripcion-fuentes')); ?>">Suscripción-Fuentes</a>
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