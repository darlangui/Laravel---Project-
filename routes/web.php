<?php

use App\Http\Controllers\CidadesController;
use App\Http\Controllers\PostosController;
use App\Http\Controllers\PrecosController;
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
    return view('home');
});

Route::resource('/cidades',CidadesController::class)->middleware('auth');

Route::resource('/postos',PostosController::class)->middleware('auth');

Route::resource('/precos',PrecosController::class)->middleware('auth');

Route::get('/relatorios/listaPostosCidades', 'App\Http\Controllers\CidadesController@listaPostosCidades');
Route::get('/relatorios/listaPrecosPostos', 'App\Http\Controllers\PostosController@listaPrecosPostos');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
