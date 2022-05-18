<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Controller;
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
Route::get('/loginUser', [LoginController::class, 'loginUser']);
Route::post('/authenticate', [LoginController::class, 'authenticate']);
Route::get('/succesLogin', [LoginController::class, 'successLogin']);

Route::get('/getAppointments', [AppointmentController::class, 'getAppointments']); //->middleware('auth');
Route::get('/header', [Controller::class, 'header']);
