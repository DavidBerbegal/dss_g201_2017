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
    return view('home');
});

Route::get('/admin', function () {
    return view('index');
}) -> middleware ('auth');

// Rutas Artículos
Route::get('/upvote', 'articulosController@upvote');
Route::get('/downvote', 'articulosController@downvote');
Route::get('/buscaCategoria/{idCat}', 'articulosController@buscaCategoria');


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
    Route::any('/fuentes', 'fuentesController@index');
    Route::post('/fuentes', 'fuentesController@destroy');
    Route::get('/fuentes', 'fuentesController@listSources');
    Route::post('/nuevaFuente', 'fuentesController@create');
    Route::get('/modificarFuente', 'fuentesController@showSource');
    Route::post('/modificarFuente', 'fuentesController@update');
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
    Route::post('/usuarios', 'usuariosController@deleteUser');
    Route::get('/usuarios', 'usuariosController@listUsers');
    Route::post('/usuariosCreateUpdate', 'usuariosController@createUser');
    Route::get('/usuariosUpdate', 'usuariosController@showUser');
    Route::post('/usuariosUpdate', 'usuariosController@updateUser');
    Route::get('/usuarios/delete', 'usuariosController@deleteUser');
    Route::post('/usuarios', 'usuariosController@searchUser');
});

Route::get('/usuariosCreateUpdate', function () {
    return view('usuariosCreateUpdate');
}) -> middleware('auth');

//RUTAS SOURCE PUBLIC
Route::get('/fuentesPub' , 'fuentesController@listPublicSources');
Route::get('/fuentesPub/search' , 'fuentesController@searchPubSources');

//RUTAS FEED
Route::get('/feed' , 'articulosController@listArticulosFeed');
Route::get('/feed/search' , 'articulosController@searchFeed');

//RUTA PERFIL USUARIO
Route::group(['middleware' => 'auth'], function() {
    //Route::get('/profile', 'UsersController@profile');
    Route::get('/profile', 'usuariosController@showProfile');
    Route::get('/profile/edit' , 'usuariosController@editProfile');
    Route::get('/profile/eraseCat', 'suscripcionCategoriasController@deletePub');
    Route::get('/profile/eraseSrc', 'suscripcionFuentesController@deletePub');

    //Suscripciones publicas

    Route::get('/sources/sub' , 'suscripcionFuentesController@addPub');
    Route::get('/sources/desub' , 'suscripcionFuentesController@desuscribe');
    Route::get('/categories/sub' , 'suscripcionCategoriasController@addPub');
    Route::get('/categories/desub' , 'suscripcionCategoriasController@desuscribe');
});

// Autenticación de usuarios
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


