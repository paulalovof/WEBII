<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/simples', function () {
    return "<h1>Rota Simples</h1>";
});

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/eixo', '\App\Http\Controllers\EixoController');
Route::resource('/nivel', '\App\Http\Controllers\NivelController');
Route::resource('/curso', '\App\Http\Controllers\CursoController');
Route::resource('/permission', '\App\Http\Controllers\PermissionController');
Route::resource('/turma', '\App\Http\Controllers\TurmaController');
Route::resource('/categoria', '\App\Http\Controllers\CategoriaController');