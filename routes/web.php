<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\TourController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::view('/', 'home');
Route::view('/about', 'about');

Route::get('/contact', [ContactController::class, 'showForm']);
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

Route::get('/tours/difficulty/{difficulty}', [TourController::class, 'byDifficulty'])->where('difficulty', 'easy|medium|hard')->name('tours.byDifficulty');

Route::resource('tours', TourController::class);

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');


