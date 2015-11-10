<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', "Login\LoginController@index");
Route::get('/login/create', "Login\LoginController@create");
Route::post('/login/store', "Login\LoginController@store");
Route::post('/login/autenticar', "Login\LoginController@autenticar");
Route::get('/logout', "Login\LoginController@logout");

// RUTAS PARA EL MANEJO DE ERRORES
Route::get("/errorcultivo","ErrorController@cultivoActivo");


// RUTAS PARA MANEJAR CULTIVO

Route::resource("cultivo","CultivoController");
 // RUTAS EXTRAS CULTIVO
Route::get('/cultivo/iniciar/{id}', "CultivoController@iniciar");
Route::get('/cultivo/terminar/{id}', "CultivoController@terminar");
Route::get('/cultivo/aplicar/{id}', "CultivoController@aplicar");
Route::get('/cultivo/nuevamaleza/{maleza}/{cultivo}', "CultivoController@nuevaMaleza");



// RUTAS PARA MANEJAR Activos

Route::resource("activo","ActivoController");

Route::get("/activo/activosmaleza/{idmaleza}","ActivoController@activosmaleza");


//RUTAS PARA MANEJAR MEDIDAS

Route::resource("medida","MedidaController");



//RUTAS PARA LA BUSQUEDA
Route::get("/busqueda", "BusquedaController@index");
Route::post("/busqueda/all", "BusquedaController@buscar");
Route::get("/busqueda", "BusquedaController@index");
Route::get("/busqueda/detalle/{id}", "BusquedaController@show");



//RUTAS PARA MANEJAR MALEZA
Route::get("maleza/imagen","MalezaController@cargarImagenes");
Route::post("maleza/addfoto", "MalezaController@addfoto");


