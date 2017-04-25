<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
            <br>
            <div class="flex-center"><div>
                <!--<div class="title m-b-md">
                    Artículos
                </div>
                    !-->
                <div class="flex-center links">
                    <a href="<?php echo e(url('/')); ?>">Home</a>
                    <a href="<?php echo e(url('/fuentes')); ?>">Fuentes</a>
                    <a href="<?php echo e(url('/articulos')); ?>">Artículos</a>
                    <a href="<?php echo e(url('/usuarios')); ?>">Usuarios</a>
                    <a href="<?php echo e(url('/categorias')); ?>">Categorías</a>
                    <a href="<?php echo e(url('/suscripcion-categorias')); ?>">Suscripción-Categorías</a>
                    <a href="<?php echo e(url('/suscripcion-fuentes')); ?>">Suscripción-Fuentes</a>
                </div>
                 <div>
                    <hr>
                 <?php if($mensaje != ""): ?>

                    <div class="flex-center"><h2><?php echo e($mensaje); ?></h2></div>
                <?php endif; ?>
                <div class="flex-center"><div>
                   <form action="<?php echo e(action('articulosController@index')); ?>" name="sortBy"
                     method="GET">
                    
                    <label for="order">Ordenar articulos por:</label>
                    <select name="order" id='order'>
                        <option selected value="id">ID</option>
                        <option value="author">Author</option>
                        <option  value="title">Title</option>
                    </select>
                    <button type="submit" name="sortBy">Ordenar</button>
                </form>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><h4>ID:</h4></th>
                            <th><h4>Author:</h4></th>
                            <th><h4>Title:</h4></th>
                            <th><h4>Description:</h4></th>
                            <th><h4>Date:</h4></th>
                            <th><h4>PositiveRate:</h4></th>
                            <th><h4>NegativeRate:</h4></th>
                            <th><h4>SourceID:</h4></th>
                            <th><h4>CategoryID:</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(sizeof($articles) == 0): ?>
                        <br>
                        <br>
                        <div><h3>No hay coincidencias para estos criterios de búsqueda</h3></div>
                    <?php endif; ?>
                    
                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $art): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($art->id); ?></td>
                            <td><?php echo e($art->author); ?></td>
                            <td><?php echo e($art->title); ?></td>
                            <td><?php echo e($art->description); ?></td>
                            <td><?php echo e($art->date); ?></td>
                            <td><?php echo e($art->positiveRate); ?></td>
                            <td><?php echo e($art->negativeRate); ?></td>
                            <td><?php echo e($art->source_id); ?></td>
                            <td><?php echo e($art->category_id); ?></td> 
                                <td>    
                                    <a>
                                        <form action="<?php echo e(action('articulosController@delete', ['id' =>  $art->id ])); ?>" name="delete"
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
                <div class="flex-center">
                    <?php echo e($articles->appends(['order' => $order])->links()); ?>

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