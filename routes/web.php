<?php

use App\Http\Controllers\LoginController;
use App\Http\Livewire\Drawings;
use App\Http\Livewire\DrawingsCreate;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Projects;
use App\Http\Livewire\ProjectsCreate;
use App\Models\Drawing;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::get('login', [LoginController::class, 'index'])->name('login');

Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::get('logout', function () {
    Auth::logout();

    return redirect()->to(route('login'));
})->name('logout');

Route::get('api/drawings/images/{drawing}', "App\Http\Controllers\DrawingsApiController@getDrawingImage");

Route::prefix('projects')->group(function () {
    Route::name('projects.')->group(function () {
        Route::get('/', Projects::class)
            ->name('index')
            ->can('view', User::class);

        Route::get('/create', ProjectsCreate::class)
            ->name('create')
            ->can('create', User::class);

        Route::get('/{project}/edit', ProjectsCreate::class)
            ->name('edit')
            ->can('update', [User::class, Project::class]);

        Route::prefix('/{project}/drawings')->group(function () {
            Route::name('drawings.')->group(function () {
                Route::get('/', Drawings::class)
                    ->name('index')
                    ->can('view', [User::class, Drawing::class]);

                Route::get('/create', DrawingsCreate::class)
                    ->name('create')
                    ->can('view', [User::class, Drawing::class]);

                Route::get('/{drawing}/edit', DrawingsCreate::class)
                    ->name('edit')
                    ->can('view', [User::class, Drawing::class]);
            });
        });
    });
});
