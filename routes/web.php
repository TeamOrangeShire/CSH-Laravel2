<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactBackEnd;
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
