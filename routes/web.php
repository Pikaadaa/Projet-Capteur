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
})->name('accueil');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/vehicle/create', 'App\Http\Controllers\VehicleController@create')->name('vehicle.create');
Route::post('/vehicle/create', 'App\Http\Controllers\VehicleController@enregister')->name('vehicle.enregister');
Route::get('/vehicle', 'App\Http\Controllers\VehicleController@show')->name('vehicle.show');
Route::get('/vehicle/delete/{id}', 'App\Http\Controllers\VehicleController@delete')->name('vehicle.delete');
Route::get('/vehicle/edit/{id}/{employee_id}', 'App\Http\Controllers\VehicleController@showData')->name('vehicle.showData');
Route::post('/vehicle/edit', 'App\Http\Controllers\VehicleController@update')->name('vehicle.edit');

require __DIR__.'/auth.php';
