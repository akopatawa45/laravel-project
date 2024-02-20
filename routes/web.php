<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('HR_welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::middleware('admin')->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('Admin Dashboard');
});
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'login'])->name('admin_login');
    Route::post('/login-submit', [AdminController::class, 'login_submit'])->name('admin_login_submit');
    Route::get('logout', [AdminController::class, 'logout'])->name('admin_logut');

    // Employee Module Route
    Route::get('list', [AdminController::class, 'list'])->name('Employee List');
    Route::get('add', [AdminController::class, 'add_function'])->name('Add Employee');
    Route::post('add', [AdminController::class, 'add_submit'])->name('Add Submit');
});

Route::middleware('employee')->group(function () {
    Route::get('employee/dashboard', [EmployeeController::class, 'dashboard'])->name('employee_dashboard');
});
Route::prefix('employee')->group(function () {
    Route::get('login', [EmployeeController::class, 'login'])->name('employee_login');
    Route::get('logout', [EmployeeController::class, 'logout'])->name('employee_logut');
    Route::post('/login-submit', [EmployeeController::class, 'login_submit'])->name('employee_login_submit');
});