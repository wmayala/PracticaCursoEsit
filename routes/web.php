<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectosController;
use App\Models\Proyectos;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/index', function () {
//     return view('proyectos/index');
// })->middleware(['auth', 'verified'])->name('proyectos.index');

Route::middleware('auth')->group(function () {
    Route::get('/index', [ProyectosController::class, 'index'])->name('proyectos.index');
    Route::get('/create', [ProyectosController::class, 'create'])->name('proyectos.create');
    Route::post('/store', [ProyectosController::class, 'store'])->name('proyectos.store');
    Route::get('/edit/{id}', [ProyectosController::class, 'edit'])->name('proyectos.edit');
    Route::put('/update/{id}', [ProyectosController::class, 'update'])->name('proyectos.update');
    Route::delete('/delete/{id}', [ProyectosController::class, 'destroy'])->name('proyectos.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
