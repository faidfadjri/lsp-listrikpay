<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Pages\ClientController;

// Authentication Routes
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('daftar', [AuthController::class, 'register'])->name('register');

Route::get('/', [ClientController::class, 'index'])->name('home');
