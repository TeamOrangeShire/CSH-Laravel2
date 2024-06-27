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

Route::get('/brochures/', function () {
    return view('Brochures.index');
})->name('brochures');

Route::post('/sendMessage', [ContactBackEnd::class, 'SubmitMessage'])->name('sendMessage');


//Admin Routes Front End
Route::get('/admin',[Authenticate::class, 'Dashboard'])->name('admin');
Route::get('/admin/login', function () { return view('admin.login');})->name('adminLogin');
Route::get('/admin/signup', function () { return view('admin.signup');})->name('adminSignup');
Route::get('/admin/pipeline/{state}', [Authenticate::class, 'PipeLine'])->name('pipeline');
Route::get('/admin/attendance', [Authenticate::class, 'Attendance'])->name('adminAttendance');
Route::get('/admin/monitoring/attendance', [Authenticate::class, 'AttendanceMonitoring'])->name('adminAttendanceMonitoring');
Route::get('/admin/monitoring/email', [Authenticate::class, 'EmailMonitoring'])->name('adminEmailMonitoring');
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
Route::post('/admin/pipelineload/updateSMTPConfig', [AdminBackEnd::class, 'UpdateSMTPConfig'])->name('updateSMTPConfig');
Route::post('/admin/pipelineload/saveEmailTempSig', [AdminBackEnd::class, 'SaveEmailTemp'])->name('SaveEmailTemp');
Route::get('/admin/pipelineload/LoadTempSig', [AdminBackEnd::class, 'LoadTempSig'])->name('LoadTempSig');
Route::get('/admin/pipelineload/getTempSig', [AdminBackEnd::class, 'GetTempSig'])->name('GetTempSig');
Route::post('/admin/pipelineload/UpdateEmailTempSig', [AdminBackEnd::class, 'UpdateEmailTempSig'])->name('UpdateEmailTempSig');
Route::post('/admin/pipelineload/DisableEmTempSig', [AdminBackEnd::class, 'DisableEmTempSig'])->name('DisableEmTempSig');
Route::post('/admin/pipelineload/SwitchToActiveSig', [AdminBackEnd::class, 'SwitchToActiveSig'])->name('SwitchToActiveSig');
Route::get('/admin/pipelineload/LoadActiveSignature', [AdminBackEnd::class, 'LoadActiveSignature'])->name('LoadActiveSignature');
Route::post('/admin/pipelineload/SendCustomMail', [AdminBackEnd::class, 'SendCustomMail'])->name('SendCustomMail');
Route::get('/admin/pipelineload/massEmailLeads', [AdminBackEnd::class, 'MassEmailLeads'])->name('massEmailLeads');
Route::get('/admin/pipelineload/checkMassMailValidity', [AdminBackEnd::class, 'CheckMassMailValidity'])->name('checkMassMailValidity');
Route::post('/admin/pipelineload/sentProgressMassMail', [AdminBackEnd::class, 'SentProgressMassMail'])->name('sentProgressMassMail');

Route::post('/admin/pipelineload/addEmailSubject', [AdminBackEnd::class, 'AddEmailSubject'])->name('addEmailSubject');
Route::get('/admin/pipelineload/loadEmailSubject', [AdminBackEnd::class, 'LoadEmailSubject'])->name('loadEmailSubject');
Route::post('/admin/pipelineload/updateEmailSubject', [AdminBackEnd::class, 'UpdateEmailSubject'])->name('updateEmailSubject');
Route::post('/admin/pipelineload/disableEmailSubject', [AdminBackEnd::class, 'DisableEmailSubject'])->name('disableEmailSubject');
Route::get('/admin/pipelineload/getTempView', [AdminBackEnd::class, 'GetTempView'])->name('getTempView');

Route::get('/admin/monitoring/email/load', [AdminBackEnd::class, 'LoadSentEmail'])->name('loadSentEmail');
Route::get('/admin/monitoring/attendance/load', [AdminBackEnd::class, 'AttMonLoad'])->name('attMonLoad');

Route::post('/admin/user/settings/updateUserDetails', [AdminBackEnd::class, 'UpUserDetails'])->name('upUserDetails');
Route::post('/admin/user/settings/changePassword', [AdminBackEnd::class, 'ChangePassword'])->name('changePassword');
Route::post('/admin/user/settings/changeProfilePic', [AdminBackEnd::class, 'ChangeProfilePic'])->name('changeProfilePic');

Route::get('/track-email/{id}', [AdminBackEnd::class, 'EmailTracking'])->name('emailTracking');
Route::post('/admin/logout', [AdminBackEnd::class, 'UserLogout'])->name('userLogout');