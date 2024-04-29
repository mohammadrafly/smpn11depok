<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::middleware('guest')->group(function () {
    Route::prefix('home')->group(function () { 
        Route::controller(HomeController::class)->group(function () {
            Route::get('/socialmedia', 'getSocialMedia')->name('get.socialmedia');
            Route::get('/category/{id}', 'getCategoryById')->name('get.category.id');
            Route::get('/', 'index')->name('home');
            Route::get('/kepala-sekolah', 'kepalasekolah')->name('home.kepalasekolah');
            Route::get('/pengumuman', 'pengumuman')->name('home.pengumuman');
            Route::get('/tentang-kami', 'tentangkami')->name('home.tentangkami');
            Route::get('/hubungi-kami', 'hubungikami')->name('home.hubungikami');
            Route::get('/guru', 'guru')->name('home.guru');
            Route::get('/tatatertib', 'tatatertib')->name('home.tatatertib');
            Route::get('/fasilitas', 'fasilitas')->name('home.fasilitas');
            Route::get('/gallery', 'gallery')->name('home.gallery');
        });
        Route::prefix('artikel')->group(function () { 
            Route::controller(ArtikelController::class)->group(function () {
                Route::get('/', 'artikelAll')->name('artikel.all');
                Route::get('/single/{id}', 'artikelSingle')->name('artikel.single');
            });
        });
        Route::prefix('activity')->group(function () { 
            Route::controller(ActivityController::class)->group(function () {
                Route::get('/', 'activityAll')->name('activity.all');
                Route::get('/single/{id}', 'activitySingle')->name('activity.single');
            });
        });
        Route::controller(AuthController::class)->group(function () {
            Route::match(['GET', 'POST'], 'login', 'index')->name('login');
        });
    });
});

Route::middleware('isAuthenticated')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/logout', 'logout')->name('logout');
        });
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'index')->name('dashboard');
            Route::match(['GET', 'POST'], '/profile', 'profile')->name('profile');
            Route::post('/password', 'changePassword')->name('password.update');
        });
        Route::controller(UserController::class)->group(function () {
            Route::prefix('user')->group(function () {
                Route::match(['GET', 'POST'], '/', 'index')->name('user');
                Route::match(['GET', 'POST'], '/create', 'create')->name('user.create');
                Route::match(['GET', 'POST'], '/update/{id}', 'update')->name('user.update');
                Route::match(['GET'], '/delete/{id}', 'destroy')->name('user.delete');
            });
            Route::get('foto_user/{filename}', function ($filename) {
                $path = storage_path('app/public/foto_user/' . $filename);
            
                if (!file_exists($path)) {
                    abort(404);
                }
            
                return response()->file($path);
            })->name('foto_user');
        });
        Route::controller(TeacherController::class)->group(function () {
            Route::prefix('teacher')->group(function () {
                Route::match(['GET', 'POST'], '/', 'index')->name('teacher');
                Route::match(['GET', 'POST'], '/create', 'create')->name('teacher.create');
                Route::match(['GET', 'POST'], '/update/{id}', 'update')->name('teacher.update');
                Route::match(['GET'], '/delete/{id}', 'destroy')->name('teacher.delete');
            });
            Route::get('foto_guru/{filename}', function ($filename) {
                $path = storage_path('app/public/foto_guru/' . $filename);
            
                if (!file_exists($path)) {
                    abort(404);
                }
            
                return response()->file($path);
            })->name('foto_guru');
        });
        Route::controller(ReviewController::class)->group(function () {
            Route::prefix('review')->group(function () {
                Route::match(['GET', 'POST'], '/', 'index')->name('review');
                Route::match(['GET', 'POST'], '/create', 'create')->name('review.create');
                Route::match(['GET', 'POST'], '/update/{id}', 'update')->name('review.update');
                Route::match(['GET'], '/delete/{id}', 'destroy')->name('review.delete');
            });
            Route::get('foto_reviewer/{filename}', function ($filename) {
                $path = storage_path('app/public/foto_reviewer/' . $filename);
            
                if (!file_exists($path)) {
                    abort(404);
                }
            
                return response()->file($path);
            })->name('foto_reviewer');
        });
        Route::controller(ActivityController::class)->group(function () {
            Route::prefix('activity')->group(function () {
                Route::match(['GET', 'POST'], '/', 'index')->name('activity');
                Route::match(['GET', 'POST'], '/create', 'create')->name('activity.create');
                Route::match(['GET', 'POST'], '/update/{id}', 'update')->name('activity.update');
                Route::match(['GET'], '/delete/{id}', 'destroy')->name('activity.delete');
            });
            Route::get('foto_kegiatan/{filename}', function ($filename) {
                $path = storage_path('app/public/foto_kegiatan/' . $filename);
            
                if (!file_exists($path)) {
                    abort(404);
                }
            
                return response()->file($path);
            })->name('foto_kegiatan');
        });
        Route::controller(ArtikelController::class)->group(function () {
            Route::prefix('artikel')->group(function () {
                Route::match(['GET', 'POST'], '/', 'index')->name('artikel');
                Route::match(['GET', 'POST'], '/create', 'create')->name('artikel.create');
                Route::match(['GET', 'POST'], '/update/{id}', 'update')->name('artikel.update');
                Route::match(['GET'], '/delete/{id}', 'destroy')->name('artikel.delete');
            });
            Route::get('foto_artikel/{filename}', function ($filename) {
                $path = storage_path('app/public/foto_artikel/' . $filename);
            
                if (!file_exists($path)) {
                    abort(404);
                }
            
                return response()->file($path);
            })->name('foto_artikel');
        });
        Route::controller(HeaderController::class)->group(function () {
            Route::prefix('header')->group(function () {
                Route::match(['GET', 'POST'], '/', 'index')->name('header');
                Route::match(['GET', 'POST'], '/create', 'create')->name('header.create');
                Route::match(['GET', 'POST'], '/update/{id}', 'update')->name('header.update');
                Route::match(['GET'], '/delete/{id}', 'destroy')->name('header.delete');
            });
            Route::get('foto_header/{filename}', function ($filename) {
                $path = storage_path('app/public/foto_header/' . $filename);
            
                if (!file_exists($path)) {
                    abort(404);
                }
            
                return response()->file($path);
            })->name('foto_header');
        });
        Route::controller(CategoryController::class)->group(function () {
            Route::prefix('category')->group(function () {
                Route::match(['GET', 'POST'], '/', 'index')->name('category');
                Route::match(['GET', 'POST'], '/create', 'create')->name('category.create');
                Route::match(['GET', 'POST'], '/update/{id}', 'update')->name('category.update');
                Route::match(['GET'], '/delete/{id}', 'destroy')->name('category.delete');
            });
        });
        Route::controller(GalleryController::class)->group(function () {
            Route::prefix('gallery')->group(function () {
                Route::match(['GET', 'POST'], '/', 'index')->name('gallery');
                Route::match(['GET', 'POST'], '/create', 'create')->name('gallery.create');
                Route::match(['GET', 'POST'], '/update/{id}', 'update')->name('gallery.update');
                Route::match(['GET'], '/delete/{id}', 'destroy')->name('gallery.delete');
            });
            Route::get('gallery/{filename}', function ($filename) {
                $path = storage_path('app/public/gallery/' . $filename);
            
                if (!file_exists($path)) {
                    abort(404);
                }
            
                return response()->file($path);
            })->name('gallery_foto');
        });
        Route::controller(SocialMediaController::class)->group(function () {
            Route::prefix('socialmedia')->group(function () {
                Route::match(['GET', 'POST'], '/', 'index')->name('socialmedia');
                Route::match(['GET', 'POST'], '/create', 'create')->name('socialmedia.create');
                Route::match(['GET', 'POST'], '/update/{id}', 'update')->name('socialmedia.update');
                Route::match(['GET'], '/delete/{id}', 'destroy')->name('socialmedia.delete');
            });
        });
        Route::controller(VideoController::class)->group(function () {
            Route::prefix('video')->group(function () {
                Route::match(['GET', 'POST'], '/', 'index')->name('video');
                Route::match(['GET', 'POST'], '/create', 'create')->name('video.create');
                Route::match(['GET', 'POST'], '/update/{id}', 'update')->name('video.update');
                Route::match(['GET'], '/delete/{id}', 'destroy')->name('video.delete');
            });
        });
    });
}); 