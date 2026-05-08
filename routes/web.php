<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// ✅ Racine : redirige vers tasks.index
// Si non connecté → Laravel redirige automatiquement vers /login (grâce au middleware auth)
Route::get('/', fn() => redirect()->route('tasks.index'));

// ✅ Routes tasks — protégées par auth (UN SEUL groupe)
Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class);
});

// ✅ Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
