<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactBackEnd;
use App\Http\Controllers\Authenticate;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/services', function () {
    return view('Services.index');
})->name('services');

Route::get('/services/bpo', function () {
    return view('Services.bpo');
})->name('bpo');

Route::get('/services/technology-outsourcing', function () {
    return view('Services.technology');
})->name('technology');

Route::get('/services/consulting', function () {
    return view('Services.consulting');
})->name('consulting');

Route::post('/sendMessage', [ContactBackEnd::class, 'SubmitMessage'])->name('sendMessage');


//Admin Routes Front End
Route::get('/admin',[Authenticate::class, 'Dashboard'])->name('admin');
Route::get('/admin/login', function () { return view('admin.login');})->name('adminLogin');
Route::get('/admin/signup', function () { return view('admin.signup');})->name('adminSignup');

Route::get('/admin/attendance', [Authenticate::class, 'Attendance'])->name('adminAttendance');

//Admin Routes BackEnd
Route::post('/admin/login/authenticate', [Authenticate::class, 'AdminLogin'])->name('login');
Route::post('/admin/login/signup', [Authenticate::class, 'AdminSignup'])->name('signup');
Route::post('/admin/login/verify', [Authenticate::class, 'AdminVerify'])->name('verification');
