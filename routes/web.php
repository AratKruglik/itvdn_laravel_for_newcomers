<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('dashboard'));
});

Route::controller(TodoController::class)->middleware(['auth'])->group(function () {
    Route::get('dashboard', 'index')->name('dashboard');
    Route::get('dashboard/archived', 'archive')->name('dashboard.archive');

    Route::prefix('todos')->group(function () {
        Route::get('create', 'create')->name('todos.create');
        Route::post('store', 'store')->name('todos.store');
        Route::get('{todo}/edit', 'edit')->name('todos.edit');
        Route::get('{todo}/done', 'done')->name('todos.done');
    });
});

require __DIR__ . '/auth.php';
