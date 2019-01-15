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

// Route::get('/', 'TodosController@index')->name('root');
// Route::get('todos', 'TodosController@index')->name('todos.index');
// Route::get('todos/create', 'TodosController@create')->name('todos.create');
// Route::post('todos', 'TodosController@store')->name('todos.store');
// Route::get('todos/{todo}/edit', 'TodosController@edit')->name('todos.edit');
// Route::put('todos/{todo}/update', 'TodosController@update')->name('todos.update');
// Route::delete('todos/{todo}', 'TodosController@destroy')->name('todos.delete');

// Route::get('/', function () {
//   return view('todos.index');
// })->name('todos.index')->middleware('login');

// Authentication routes
Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', 'Auth\LoginController@logout')->name('logout');

// Registration routes
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('auth/register', 'Auth\RegisterController@register');

Route::middleware('auth')->group(function(){
  Route::get('/', function(){
    return view('todos.index');
  })->name('todos.index');
});


