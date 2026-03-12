<?php

use App\Http\Controllers\About;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\homeCntroler;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use Illuminate\View\View;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', [About::class, 'index'])->name('about.index');
Route::get('/home', [homeCntroler::class, 'index'])->name('home.index');
Route::get('/contact',[ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/store',[ContactController::class, 'store'])->name('contact.store');
// Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
// Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/G', [PhotoController::class,'index'])->name('gallery');
Route::post('/photos', [PhotoController::class,'store'])->name('photos.store');
Route::delete('/photos/{id}', [PhotoController::class,'destroy'])->name('photos.destroy');
Route::get('/emails', [EmailController::class, 'index'])->name('email.index');
Route::post('/email/store', [EmailController::class, 'store'])->name('email.store');
Route::delete('/email/destroy/{email}', [EmailController::class, 'destroy'])->name('email.destroy');
Route::patch('/email/toggle/{email}', [EmailController::class, 'toggleRead'])->name('email.toggle');
Route::resource('/courses', CourseController::class);

Route::resource('/teachers', TeacherController::class);
Route::get('/', function () {

    return view('home');
});

