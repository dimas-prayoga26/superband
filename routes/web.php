<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('home');
Route::view('/index.html', 'index');
Route::view('/about', 'about')->name('about');
Route::view('/about.html', 'about');
Route::view('/register', 'register')->name('register');
Route::view('/register.html', 'register');
Route::post('/register', [RegistrationController::class, 'store'])->name('registrations.store');
Route::view('/success', 'success')->name('success');
Route::view('/success.html', 'success');
Route::view('/voting', 'voting')->name('voting');
Route::view('/voting.html', 'voting');
Route::view('/article-details', 'article-details')->name('article-details');
Route::view('/article-details.html', 'article-details');
Route::view('/email-registration-preview', 'email-registration-preview')->name('email.preview');
Route::view('/email-registration-preview.html', 'email-registration-preview');
