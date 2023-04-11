<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware(['auth:api', 'permission'])->group(function() {
  // clients
  Route::get('cliente', 'App\Http\Controllers\Api\ClientController@index')->name('cliente.lista');
  Route::get('cliente/{id}', 'App\Http\Controllers\Api\ClientController@show')->name('cliente.mostrar');
  Route::post('cliente', 'App\Http\Controllers\Api\ClientController@store')->name('cliente.criar');
  Route::put('cliente/{id}', 'App\Http\Controllers\Api\ClientController@update')->name('cliente.atualizar');
  Route::delete('cliente/{id}', 'App\Http\Controllers\Api\ClientController@destroy')->name('cliente.excluir');
  Route::put('cliente/{id}/status', 'App\Http\Controllers\Api\ClientController@updateStatus')->name('cliente.atualizar_status');

}); 
