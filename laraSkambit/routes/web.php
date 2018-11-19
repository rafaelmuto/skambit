<?php

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

Route::Get('/', 'mainController@main');
Route::Get('/home', 'mainController@main');
Route::Get('/faqs', 'mainController@faqs');


Route::Post('/login', 'cadastroUsuario@login');
Route::Get('/logout', 'cadastroUsuario@logout');
Route::Get('/cadUsuario', 'cadastroUsuario@add');
Route::Post('/cadUsuario', 'cadastroUsuario@add');


Route::Get('/cadProduto', function(){
  return view('cadProduto');
});



Route::Get('/teste/{id}', 'cadastroUsuario@getInfo');
