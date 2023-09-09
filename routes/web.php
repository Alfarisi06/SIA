<?php

use App\Http\Controllers\Akun\AkunController;
use App\Http\Controllers\Akun\Service\AkunServiceController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\Service\AuthServiceController;
use App\Http\Controllers\Dashboard\DashboardController;
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
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [AuthServiceController::class, 'authenticate'])->name('auth.authenticate');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('/logout', [AuthServiceController::class, 'logout'])->name('auth.logout');
    Route::get('/akun', [AkunController::class, 'index'])->name('akun.index');
    Route::get('/akun/create', [AkunController::class, 'create'])->name('akun.create');
    Route::post('/akun', [AkunServiceController::class, 'store'])->name('akun.store');
    Route::get('/akun/{id}', [AkunController::class, 'show'])->name('akun.show');
    Route::put('/akun/{id}', [AkunServiceController::class, 'update'])->name('akun.update');//update
    Route::delete('/akun/{id}', [AkunServiceController::class, 'destroy'])->name('akun.destroy'); //destroy
});
