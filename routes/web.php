<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::controller(TodoController::class)->group(function () {
    Route::get('/', 'index');
});
