<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\TechnologyController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Rotta admin
Route::get('/admin', [ProjectController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin');



Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('projects', ProjectController::class);
});

// Rotta per Eliminare un progetto
Route::resource('projects', ProjectController::class);

Route::get('/admin/projects/{id}', [ProjectController::class, 'show'])->name('info');

// Gestione tipi e teconologie
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('types', TypeController::class);
    Route::resource('technologies', TechnologyController::class);
});
