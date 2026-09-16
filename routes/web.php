<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/success', 'success')->name('success');
    Route::get('/voting', 'voting')->name('voting');
    Route::get('/article-details', 'articleDetails')->name('article-details');
    Route::get('/email-registration-preview', 'emailRegistrationPreview')->name('email.preview');
});

Route::middleware('guest')->group(function () {
    Route::redirect('/login', '/admin/login');
    Route::get('/admin/login', [LoginController::class, 'staff'])->name('login');
    Route::post('/admin/login', [LoginController::class, 'authenticateStaff'])->middleware('throttle:5,1')->name('login.store');
    Route::get('/voting/login', [LoginController::class, 'voting'])->name('voting.login');
    Route::post('/voting/login', [LoginController::class, 'authenticateVoting'])->middleware('throttle:5,1')->name('voting.login.store');
    Route::post('/voting/register', [LoginController::class, 'registerVoting'])->middleware('throttle:5,1')->name('voting.register.store');
});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth', 'can:access admin panel'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function (): void {
        Route::redirect('/', '/admin/dashboard')->name('index');
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/peserta', [DashboardController::class, 'participants'])->name('participants');
    });

Route::resource('register', RegistrationController::class)
    ->only(['index', 'store'])
    ->names([
        'index' => 'register',
        'store' => 'registrations.store',
    ]);
