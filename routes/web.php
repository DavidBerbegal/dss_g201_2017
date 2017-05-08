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

Route::get('/admin', function () {
    return view('index');
}) -> middleware ('auth');

// Rutas Artículos
Route::get('/upvote', 'articulosController@upvote');
Route::get('/downvote', 'articulosController@downvote');


Route::group(['middleware' => 'auth'], function() {
    Route::any('/articulos', 'articulosController@index');
    Route::post('/articulos', 'articulosController@delete');
    Route::get('/articulos', 'articulosController@index');
});

// Rutas Categorias

Route::get('/nuevaCategoria', function() {
    return view('nuevaCategoria');
}) -> middleware('auth');

Route::group(['middleware' => 'auth'], function() {
    Route::any('/categorias', 'categoriasController@index');
    Route::post('/categorias', 'categoriasController@destroy');
    Route::get('/categorias', 'categoriasController@listCategories');
    Route::post('/nuevaCategoria', 'categoriasController@create');
    Route::get('/categoriaUpdate', 'categoriasController@showCategory');
    Route::post('/categoriaUpdate', 'categoriasController@update');
});

// Rutas Fuentes

Route::get('/nuevaFuente', function() {
    return view('nuevaFuente');
}) -> middleware('auth');

Route::group(['middleware' => 'auth'], function() {
    Route::any('/fuentes', 'controllerSources@index');
    Route::post('/fuentes', 'controllerSources@destroy');
    Route::get('/fuentes', 'controllerSources@listSources');
    Route::post('/nuevaFuente', 'controllerSources@create');
    Route::get('/modificarFuente', 'controllerSources@showSource');
    Route::post('/modificarFuente', 'controllerSources@update');
});

// Rutas Sucripción Categoría
Route::group(['middleware' => 'auth'], function() {
    Route::any('/suscripcion-categorias', 'suscripcionCategoriasController@index');
    Route::get('/suscripcion-categorias', 'suscripcionCategoriasController@index');
    Route::post('/suscripcion-categorias', 'suscripcionCategoriasController@delete');
});

// Rutas Suscripción Fuentes
Route::group(['middleware' => 'auth'], function() {
    Route::any('/suscripcion-fuentes', 'suscripcionFuentesController@index');
    Route::get('/suscripcion-fuentes', 'suscripcionFuentesController@index');
    Route::post('/suscripcion-fuentes', 'suscripcionFuentesController@delete');
});

// Rutas de Usuario
Route::group(['middleware' => 'auth'], function() {
    Route::post('/usuarios', 'UsersController@deleteUser');
    Route::get('/usuarios', 'UsersController@listUsers');
    Route::post('/usuariosCreateUpdate', 'UsersController@createUser');
    Route::get('/usuariosUpdate', 'UsersController@showUser');
    Route::post('/usuariosUpdate', 'UsersController@updateUser');
    Route::get('/usuarios/delete', 'UsersController@deleteUser');
    Route::post('/usuarios', 'UsersController@searchUser');
});

Route::get('/usuariosCreateUpdate', function () {
    return view('usuariosCreateUpdate');
}) -> middleware('auth');

//RUTAS SOURCE PUBLIC
Route::get('/fuentesPub' , 'controllerSources@listPublicSources');
Route::get('/fuentesPub/search' , 'controllerSources@searchPubSources');

//RUTAS FEED
Route::get('/feed' , 'articulosController@listArticulosFeed');
Route::get('/feed/search' , 'articulosController@searchFeed');

//RUTA PERFIL USUARIO
Route::group(['middleware' => 'auth'], function() {
    //Route::get('/profile', 'UsersController@profile');
    Route::get('/home', 'HomeController@index')->name('home');
});

// Autenticación de usuarios
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
