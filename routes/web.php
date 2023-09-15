<?php

use App\Http\Controllers\Akun\AkunController;
use App\Http\Controllers\Akun\Service\AkunServiceController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\Service\AuthServiceController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Guru\GuruController;
use App\Http\Controllers\Kelas\KelasController;
use App\Http\Controllers\Kelas\Service\KelasServiceController;
use App\Http\Controllers\Mapel\MapelController;
use App\Http\Controllers\Mapel\Service\MapelServiceController;
use App\Http\Controllers\Siswa\Service\SiswaServiceController;
use App\Http\Controllers\Siswa\SiswaController;
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

    //akun
    //route akun
    Route::get('/akun', [AkunController::class, 'index'])->name('akun.index');
    Route::get('/akun/create', [AkunController::class, 'create'])->name('akun.create');
    Route::get('/akun/{id}', [AkunController::class, 'show'])->name('akun.show');

    //service akun
    Route::post('/akun', [AkunServiceController::class, 'store'])->name('akun.store');
    Route::put('/akun/{id}', [AkunServiceController::class, 'update'])->name('akun.update');
    Route::delete('/akun/{id}', [AkunServiceController::class, 'destroy'])->name('akun.destroy');

    //guru
    //route akun
    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
    //service akun

    //mapel
    //route mapel
    Route::get('/mapel', [MapelController::class, 'index'])->name('mapel.index');
    Route::get('/mapel/create', [MapelController::class, 'create'])->name('mapel.create');
    Route::get('/mapel/{id}', [MapelController::class, 'show'])->name('mapel.show');

    //service mapel
    Route::put('/mapel/{id}', [MapelServiceController::class, 'update'])->name('mapel.update');
    Route::post('/mapel', [MapelServiceController::class, 'store'])->name('mapel.store');
    Route::delete('/mapel/{id}', [MapelServiceController::class, 'destroy'])->name('mapel.destroy');

    //kelas
    //route kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::get('/kelas/{id}', [KelasController::class, 'show'])->name('kelas.show');

    //service kelas
    Route::post('/kelas', [KelasServiceController::class, 'store'])->name('kelas.store');
    Route::delete('/kelas/{id}', [KelasServiceController::class, 'destroy'])->name('kelas.destroy');
    Route::put('/kelas/{id}', [KelasServiceController::class, 'update'])->name('kelas.update');

    //siswa
    //route siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::get('/siswa/{id}', [SiswaController::class, 'show'])->name('siswa.show');

    //service siswa
    Route::post('/siswa', [SiswaServiceController::class, 'store'])->name('siswa.store');
    Route::delete('/siswa/{id}', [SiswaServiceController::class, 'destroy'])->name('siswa.destroy');
    Route::put('/siswa/{id}', [SiswaServiceController::class, 'update'])->name('siswa.update');
});
