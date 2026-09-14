<?php

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

Route::resource('register', RegistrationController::class)
    ->only(['index', 'store'])
    ->names([
        'index' => 'register',
        'store' => 'registrations.store',
    ]);
