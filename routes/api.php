<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List todos
Route::get('todos', 'TodosController@index');

// Show create page
Route::get('create', 'TodosController@create');

// Create new todos
Route::post('todos', 'TodosController@store');

// Edit todos
Route::get('todos/{todo}/edit', 'TodosController@edit');

// Update todos
Route::put('todos/{todo}', 'TodosController@update');

// Delete todos
Route::delete('todos/{todo}', 'TodosController@destroy');