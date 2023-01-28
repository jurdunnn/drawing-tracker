<?php

use App\Http\Controllers\LoginController;
use App\Http\Livewire\Drawings;
use App\Http\Livewire\Projects;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::prefix('projects')->group(function () {
    Route::name('projects.')->group(function () {
        Route::get('/create', Projects::class)->name('create');
        Route::get('/{project}/drawings', Drawings::class)->name('index');
        Route::get('/{project}/drawings/create', Drawings::class)->name('create');
    });
});
