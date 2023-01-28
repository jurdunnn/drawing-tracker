<?php

use App\Http\Controllers\LoginController;
use App\Http\Livewire\Projects;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::get('projects', [Projects::class, 'render'])->name('projects');
