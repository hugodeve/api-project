<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/clients', 'App\Http\Controllers\ClientController@index')->name('administrativo.clients.index');




/*


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/registro', function () {
    return view('clients.create');
});

Route::get('/consulta', function () {
    return view('clients.index');
});

*/
