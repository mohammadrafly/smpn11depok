<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::prefix('home')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::match(['GET', 'POST'], 'login', 'index')->name('login');
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/logout', 'logout')->name('logout');
        });
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'index')->name('dashboard');
        });
        Route::controller(UserController::class)->group(function () {
            Route::prefix('user')->group(function () {
                Route::match(['GET', 'POST'], '/', 'index')->name('user');
                Route::match(['GET', 'POST'], '/create', 'create')->name('user.create');
                Route::match(['GET', 'POST'], '/update/{id}', 'update')->name('user.update');
                Route::match(['GET'], '/delete/{id}', 'destroy')->name('user.delete');
            });
            Route::get('foto_user/{filename}', function ($filename) {
                $path = storage_path('app/foto_user/' . $filename);
            
                if (!file_exists($path)) {
                    abort(404);
                }
            
                return response()->file($path);
            })->name('foto_user');
        });
        Route::controller(GuruController::class)->group(function () {
            Route::prefix('guru')->group(function () {
                Route::match(['GET', 'POST'], '/', 'index')->name('guru');
                Route::match(['GET', 'POST'], '/create', 'create')->name('guru.create');
                Route::match(['GET', 'POST'], '/update/{id}', 'update')->name('guru.update');
                Route::match(['GET'], '/delete/{id}', 'destroy')->name('guru.delete');
            });
            Route::get('foto_guru/{filename}', function ($filename) {
                $path = storage_path('app/foto_guru/' . $filename);
            
                if (!file_exists($path)) {
                    abort(404);
                }
            
                return response()->file($path);
            })->name('foto_guru');
        });
        Route::controller(ArtikelController::class)->group(function () {
            Route::prefix('artikel')->group(function () {
                Route::match(['GET', 'POST'], '/', 'index')->name('artikel');
                Route::match(['GET', 'POST'], '/create', 'create')->name('artikel.create');
                Route::match(['GET', 'POST'], '/update/{id}', 'update')->name('artikel.update');
                Route::match(['GET'], '/delete/{id}', 'destroy')->name('artikel.delete');
            });
            Route::get('foto_artikel/{filename}', function ($filename) {
                $path = storage_path('app/foto_artikel/' . $filename);
            
                if (!file_exists($path)) {
                    abort(404);
                }
            
                return response()->file($path);
            })->name('foto_artikel');
        });
    });
}); 