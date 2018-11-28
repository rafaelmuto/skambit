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
Route::Get('home', 'mainController@main');
Route::Get('faqs', 'mainController@faqs');


Route::Post('/login', 'cadUsuario@login');
Route::Get('/logout', 'cadUsuario@logout');
Route::Get('/cadUsuario', 'cadUsuario@add');
Route::Post('/cadUsuario', 'cadUsuario@add');
Route::Get('/upUsuario', 'cadUsuario@update');
Route::Post('/upUsuario', 'cadUsuario@update');


Route::Get('like/{produto_id}', 'mainController@like');


Route::Get('/cadProduto', function(){
  return view('cadProduto');
});
//Route::Post('/cadProduto', 'cadProduto@listar');
//Route::Post('/cadProduto/{usuario_id}', 'cadProduto@listarUsuario');
Route::Get('/cadProduto', 'cadProduto@add');
Route::Post('/cadProduto', 'cadProduto@add');