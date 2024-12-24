<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\UserManagement;
use App\Livewire\Admin\TaskManagement;

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


Route::view('/', 'welcome');

// Admin dashboard route
Route::get('/dashboard/admin', function () {
    return view('dashboard.admin');
})->middleware(['auth', 'verified', 'is_admin'])->name('dashboard.admin');


// User dashboard route
Route::get('/dashboard/user', function () {
    return view('dashboard.user');
})->middleware(['auth', 'verified'])->name('dashboard.user');


Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

require __DIR__.'/auth.php';

