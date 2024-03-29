<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rutas producto
Route::get('/productos', 'ProductoController@index');
Route::post('/productos', 'ProductoController@store');
Route::get('/productos/{id}', 'ProductoController@show');
Route::put('/productos/{id}', 'ProductoController@update');
Route::delete('/productos/{id}', 'ProductoController@destroy');

// Rutas usuario
Route::get('/usuarios', 'UsuarioController@index');
Route::post('/usuarios', 'UsuarioController@store');
Route::get('/usuarios/{id}', 'UsuarioController@show');
Route::put('/usuarios/{id}', 'UsuarioController@update');
Route::delete('/usuarios/{id}', 'UsuarioController@destroy');

// Rutas para categoria
Route::get('/categorias', 'CategoriaController@index');
Route::post('/categorias', 'CategoriaController@store');
Route::get('/categorias/{id}', 'CategoriaController@show');
Route::put('/categorias/{id}', 'CategoriaController@update');
Route::delete('/categorias/{id}', 'CategoriaController@destroy');

// Rutas para imagen
Route::get('/imagenes-producto', 'ImagenProductoController@index');
Route::post('/imagenes-producto', 'ImagenProductoController@store');
Route::get('/imagenes-producto/{id}', 'ImagenProductoController@show');
Route::put('/imagenes-producto/{id}', 'ImagenProductoController@update');
Route::delete('/imagenes-producto/{id}', 'ImagenProductoController@destroy');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
