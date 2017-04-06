<?php

/*/
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// Rutas Artículos
Route::get('/articulos', function () {
    return view('articulos');
});

// Rutas Categorias

Route::any('/categorias', 'categoriasController@index');
Route::post('/categorias', 'categoriasController@destroy');
Route::get('/categorias', 'categoriasController@index');

Route::get('/nuevaCategoria', function() {
    return view('nuevaCategoria');
});

Route::post('/nuevaCategoria', 'categoriasController@create');

Route::get('/categoriaUpdate', 'categoriasController@showCategory');
Route::post('/categoriaUpdate', 'categoriasController@update');

// Rutas Fuentes
Route::any('/fuentes', 'controllerSources@index');

Route::post('/fuentes', 'controllerSources@destroy');

Route::get('/fuentes', 'controllerSources@index');

Route::get('/fuentes/nuevaFuente', function() {
    return view('nuevaFuente');
});

Route::post('/fuentes/nuevaFuente', 'controllerSources@create');

Route::get('/fuentes/modificarFuente', 'controllerSources@showSource');

Route::post('/fuentes/modificarFuente', 'controllerSources@update');

// Rutas Sucripción Categoría
Route::get('/suscripcion-categorias', function () {
    return view('suscripcionCategorias');
});

// Rutas Suscripción Fuentes
Route::get('/suscripcion-fuentes', function () {
    return view('suscripcionFuentes');
});


Route::post('/usuarios', 'UsersController@deleteUser');
Route::get('/usuarios', 'UsersController@listUsers');
Route::get('/usuariosCreateUpdate', function () {
    return view('usuariosCreateUpdate');
});
Route::post('/usuariosCreateUpdate', 'UsersController@createUser');

Route::get('/usuariosUpdate', 'UsersController@showUser');
Route::post('/usuariosUpdate', 'UsersController@updateUser');

Route::get('/usuarios/delete', 'UsersController@deleteUser');
Route::post('/usuarios', 'UsersController@searchUser');

Route::get('/fuentes/{id}/modificarFuente', function($source) {
    return view ('modificarFuente', ['edit' => '$source']);
});

