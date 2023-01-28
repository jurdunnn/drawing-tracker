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
        Route::get('/create', ProjectsCreate::class)->name('create');
        Route::get('/{project}/edit', ProjectsCreate::class)->name('edit');

        Route::prefix('/{project}/drawings')->group(function () {
            Route::name('drawings.')->group(function () {
                Route::get('/', Drawings::class)->name('index');
                Route::get('/create', DrawingsCreate::class)->name('create');
            });
        });
        /* Route::get('/{project}/drawings', Drawings::class)->name('index'); */
        /* Route::get('/{project}/drawings/create', DrawingsCreate::class)->name('create-drawing'); */
    });
});

/* Route::prefix('courses')->group(function () { */
/*     Route::name('courses.')->group(function () { */
/*         Route::get('/{course}/delete', CourseDelete::class)->name('delete'); */

/*         Route::prefix('/{course}/sessions')->group(function () { */
/*             Route::name('sessions.')->group(function () { */
/*                 Route::get('/create', SessionForm::class)->name('create'); */
/*                 Route::get('/{session}', SessionShow::class)->name('show'); */
/*                 Route::get('/{session}/delete', SessionDelete::class)->name('delete'); */
/*                 Route::get('/{session}/edit', SessionForm::class)->name('edit'); */
/*                 Route::get('/{session}/history', SessionHistoryLog::class)->name('history'); */
/*                 Route::get('/{session}/broker-prices', SessionBrokerPrices::class)->name( */
/*                     'broker-prices', */
/*                 ); */
/*                 Route::get( */
/*                     '/{session}/broker-view-exceptions', */
/*                     SessionBrokerViewExceptions::class, */
/*                 )->name('broker-view-exceptions'); */

/*                 Route::get('/{session}/manage', ManageBookingForm::class)->name('manage'); */

/*                 Route::prefix('/{session}/bookings/{booking}')->group(function () { */
/*                     Route::name('bookings.')->group(function () { */
/*                         Route::get('history', BookingHistoryLog::class)->name('history'); */
/*                         Route::get('manage', ManageBookingForm::class)->name('manage'); */
/*                     }); */
/*                 }); */
/*             }); */
/*         }); */
/*     }); */
/* }); */
