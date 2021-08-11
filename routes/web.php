<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Ruta principal (home) */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/recetas', 'RecetaController@index')->name('recetas.index');
Route::get('/recetas/create', 'RecetaController@create')->name('recetas.create');
Route::post('/recetas', 'RecetaController@store')->name('recetas.store');

Auth::routes();

/* Forma pincipal de mosrtrar contenido de una url
    Route::get('/nosotros', function () {
        return view('nosotros');
    });
*/

/* Forma de mostrar una ruta desde un controlador,
  se agrega el nombre del controlador y se le pasa el metodo.
    Route::get('/nosotros', "RecetaController@hola");
*/

/* Forma de llmar a un controlador que tiene __invoke, que es que tenga un solo metodo 
Route::get('/nosotros', "RecetaController"); */

//Route::get('/home', 'HomeController@index')->name('home');
