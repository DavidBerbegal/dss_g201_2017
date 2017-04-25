<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fuentes</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/estilos.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
        <div class="title m-b-md">
            Fuentes
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

        <?php if($mensaje != ""): ?>
        <div class="flex-center">
            <h2> 
                <?php echo e($mensaje); ?> 
            </h2>
        </div>
        <?php endif; ?>

        <form class="form-class" action="<?php echo e(action('controllerSources@listSources')); ?>" name="sortBy"
                method="GET">
            <label class="ordenar-label" for="order">Ordenar fuentes por:</label>
            <select class="bold" name="order" id='order'>
                <option selected value="id">ID</option>
                <option value="name">Nombre</option>
            </select>
            <button class="bold" type="submit" name="sortBy">Ordenar</button>
        </form> 
    </head>
    <body>
        <div class="aux flex-center position-ref full-height">
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

            <div class="content-fuentes">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><h4>ID:</h4></th>
                            <th><h4>Nombre:</h4></th>
                            <th><h4>Acción:</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $fuentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mostrarFuente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($mostrarFuente->id); ?></td>
                            <td><?php echo e($mostrarFuente->name); ?></td>
                            <td class="botones">
                                <a type="button" class="btn btn-default" href="<?php echo e(action('controllerSources@showSource', ['id' => $mostrarFuente->id ])); ?>">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a>
                                    <form action="<?php echo e(action('controllerSources@destroy', ['id' => $mostrarFuente->id ])); ?>" name="delete"
                                        method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        
                                        <button type="submit" name="delete">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    </form>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div>
                    <?php echo e($fuentes->appends(['order' => $order])->links()); ?>

                </div>
            </div>
        </div>
    </body>
    <div class="botonAgregar">
        <a type="button" class="btn btn-default" href="<?php echo e(url('/fuentes/nuevaFuente')); ?>">
            <span class="glyphicon glyphicon-plus"></span>
        </a>
    </div>
</html>