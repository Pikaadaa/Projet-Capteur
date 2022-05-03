<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\CapturController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\EmployeeController;

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
Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('accueil');
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::resource('vehicles', VehicleController::class);

    Route::resource('employees', EmployeeController::class);

    Route::resource('capturs', CapturController::class);

    Route::resource('maps', MapController::class);
});



require __DIR__.'/auth.php';
    