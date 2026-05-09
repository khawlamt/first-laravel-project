<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$profileRoute = '/profile';

Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('tasks.index')
        : redirect()->route('login');
})->name('home');

Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/services', [PageController::class, 'services'])->name('services');

Route::get('/produit', [PageController::class, 'produit'])->name('produit');

Route::get('/blog', [PageController::class, 'blog'])->name('blog');

Route::get('/blog/{id}', [PageController::class, 'article'])
    ->whereNumber('id')
    ->name('blog.article');

Route::get('/equipe/{membre?}', [PageController::class, 'equipe'])
    ->where('membre', '[A-Za-z]+')
    ->name('equipe');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () use ($profileRoute) {

    Route::resource('tasks', TaskController::class)
        ->except(['show']);

    Route::get($profileRoute, [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch($profileRoute, [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete($profileRoute, [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';


