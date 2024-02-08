<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;


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
    return view('Welcome');
});

Route::get('/register', [RegisterController::class, 'create'])->name('register');

 
Route::middleware(['auth'])->group(function () {
// Rutas de activity
Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
Route::get('/activities/{activity}', [ActivityController::class, 'show'])->name('activities.show');
Route::get('/activities/{activity}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
Route::put('/activities/{activity}', [ActivityController::class, 'update'])->name('activities.update');
Route::delete('/activities/{activity}', [ActivityController::class, 'destroy'])->name('activities.destroy');

// Rutas de los Tiempos
Route::get('/activities/{activity}/times', [TimeController::class, 'index'])->name('activities.times.index');
Route::get('/activities/{activity}/times/create', [TimeController::class, 'create'])->name('activities.times.create');
Route::post('/activities/{activity}/times', [TimeController::class, 'store'])->name('activities.times.store');
Route::get('/activities/{activity}/times/{time}/edit', [TimeController::class, 'edit'])->name('activities.times.edit');
Route::put('/activities/{activity}/times/{time}', [TimeController::class, 'update'])->name('activities.times.update');
Route::delete('/activities/{activity}/times/{time}', [TimeController::class, 'destroy'])->name('activities.times.destroy');
});
