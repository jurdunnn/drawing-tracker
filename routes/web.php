<?php

use App\Http\Controllers\LoginController;
use App\Http\Livewire\Drawings;
use App\Http\Livewire\DrawingsCreate;
use App\Http\Livewire\Projects;
use App\Http\Livewire\ProjectsCreate;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::prefix('projects')->group(function () {
    Route::name('projects.')->group(function () {
        Route::get('/', Projects::class)->name('index');
        Route::get('/create', ProjectsCreate::class)->name('create');
        Route::get('/{project}/edit', ProjectsCreate::class)->name('edit');

        Route::prefix('/{project}/drawings')->group(function () {
            Route::name('drawings.')->group(function () {
                Route::get('/', Drawings::class)->name('index');
                Route::get('/create', DrawingsCreate::class)->name('create');
                Route::get('/{drawing}/edit', DrawingsCreate::class)->name('edit');
            });
        });
    });
});
