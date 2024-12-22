<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Guest routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        return view('livewire.auth.login');
    })->name('login');
});

// Protected routes
Route::middleware(['auth'])->group(function () {
    // Admin Routes
    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', function () {
            return view('admin.users');
        })->name('users');
        
        Route::get('/tasks', function () {
            return view('admin.tasks');
        })->name('tasks');
    });
    
    // Employee Routes
    Route::middleware(['employee'])->prefix('employee')->name('employee.')->group(function () {
        Route::get('/tasks', function () {
            return view('employee.tasks');
        })->name('tasks');
    });

    // Logout route
    Route::post('/logout', function () {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});