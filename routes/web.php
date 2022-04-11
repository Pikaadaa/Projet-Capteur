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
    return view('welcome');
})->middleware(['auth'])->name('accueil');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/vehicle/create', 'App\Http\Controllers\VehicleController@create')->name('vehicle.create');
Route::post('/vehicle', 'App\Http\Controllers\VehicleController@store')->name('vehicle.store');
Route::get('/vehicle', 'App\Http\Controllers\VehicleController@index')->name('vehicle.index');
Route::delete('/vehicle/{id}', 'App\Http\Controllers\VehicleController@destroy')->name('vehicle.destroy');
Route::get('/vehicle/edit/{id}', 'App\Http\Controllers\VehicleController@edit')->name('vehicle.edit');
Route::put('/vehicle/update', 'App\Http\Controllers\VehicleController@update')->name('vehicle.update');

require __DIR__.'/auth.php';
    