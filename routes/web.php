<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\LookUpsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AddAppointmentsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/loginUser', [LoginController::class, 'loginUser'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate']);
Route::get('/succesLogin', [LoginController::class, 'successLogin']);

Route::get('/getAppointments', [AppointmentController::class, 'getAppointments'])->middleware('auth');
Route::get('/done', [AppointmentController::class, 'done'])->middleware('auth');
Route::get('/cancel', [AppointmentController::class, 'cancel'])->middleware('auth');
Route::get('/header', [Controller::class, 'header'])->middleware('auth');

Route::get('/addAppointments', [AppointmentController::class, 'addAppointments'])->middleware('auth');
Route::post('/addAppointment', [AppointmentController::class, 'addAppointment'])->middleware('auth');
Route::get('/searchAppointment', [AppointmentController::class, 'searchAppointments'])->middleware('auth');
Route::get('/searchAppointmentPopUp', [AppointmentController::class, 'searchAppointmentPopUp'])->middleware('auth');
Route::get('/showDoctorAppointments', [AppointmentController::class, 'showDoctorAppointments'])->middleware('auth');

Route::get('/checkStatus', [AppointmentController::class, 'checkStatus'])->middleware('auth');
Route::get('/cancelStatus', [AppointmentController::class, 'cancelStatus'])->middleware('auth');
Route::get('/getCitys', [LookUpsController::class, 'getCitys'])->middleware('auth');