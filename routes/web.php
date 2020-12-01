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

Route::get('/', function () {
    return view('prueba');
});
Route::get('/administrador', function () {
    return view('Admin.administrador');
});

Route::post('/Guardar/Ingreso', 'IngresoController@store');

Route::get('/Exportar/Producto','IngresoController@ExportarExcel');

Route::post('/Guardar/Visitante', 'VisitanteController@store');

Route::get('/Exportar/Visitante','VisitanteController@ExportarExcel');

Route::Resource('usuarios', 'UsuarioController');

Route::Resource('elementos', 'ElementoController');

Route::Resource('vehiculos', 'VehiculoController');

Route::Resource('visitantes', 'VisitanteController');

Route::Resource('novedades', 'NovedadController');

Route::Resource('ingresos', 'IngresoController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
