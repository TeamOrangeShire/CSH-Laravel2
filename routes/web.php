<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactBackEnd;
use App\Http\Controllers\Authenticate;
use App\Http\Controllers\AdminBackEnd;

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
Route::get('/admin/pipeline/{state}', [Authenticate::class, 'PipeLine'])->name('pipeline');
Route::get('/admin/attendance', [Authenticate::class, 'Attendance'])->name('adminAttendance');
Route::get('/admin/user', [Authenticate::class, 'User'])->name('user');
Route::get('/admin/user/settings', [Authenticate::class, 'UserSetting'])->name('userSetting');

//Admin Routes BackEnd
Route::post('/admin/login/authenticate', [Authenticate::class, 'AdminLogin'])->name('login');
Route::post('/admin/login/signup', [Authenticate::class, 'AdminSignup'])->name('signup');
Route::post('/admin/login/verify', [Authenticate::class, 'AdminVerify'])->name('verification');
Route::post('/admin/attendance/scan', [AdminBackEnd::class, 'ScanAttendance'])->name('scanAttendance');
Route::get('/admin/attendance/load', [AdminBackEnd::class, 'GetAttendance'])->name('getAttendance');

Route::post('/admin/pipeline/addLead', [AdminBackEnd::class, 'AddLead'])->name('addLead');
Route::get('/admin/pipelineload', [AdminBackEnd::class, 'LoadPipeline'])->name('loadPipeline');
Route::get('/admin/pipelineload/getlead', [AdminBackEnd::class, 'GetLeadDetails'])->name('getLeadDetails');
Route::post('/admin/pipelineload/updatelead', [AdminBackEnd::class, 'UpdateLead'])->name('updateLead');
Route::post('/admin/pipelineload/disable', [AdminBackEnd::class, 'DisableLead'])->name('disableLead');
Route::post('/admin/pipelineload/readCsv', [AdminBackEnd::class, 'ReadCSV'])->name('readCSV');