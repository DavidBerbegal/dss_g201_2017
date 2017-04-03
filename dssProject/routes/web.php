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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('index');
});

Route::get('/articulos', function () {
    return view('articulos');
});

Route::get('/categorias', function () {
    return view('categorias');
});

Route::get('/fuentes', function () {
    return view('fuentes');
});

Route::get('/suscripcion-categorias', function () {
    return view('suscripcionCategorias');
});

Route::get('/suscripcion-fuentes', function () {
    return view('suscripcionFuentes');
});

Route::any('/usuarios', 'UsersController@index');
