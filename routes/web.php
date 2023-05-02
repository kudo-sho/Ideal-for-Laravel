<?php

use App\Http\Controllers\AdminLoginCtr;
use App\Http\Controllers\AdminLogoffCtr;
use App\Http\Controllers\AdminMaintenanceCtr;
use App\Http\Controllers\AdminOperationCtr;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contactCompletion', function () {
    return view('contactCompletion');
});

Route::get('/adminLogin', function () {
    return view('adminLogin');
});
Route::get('/adminIndex', function () {
    return view('adminIndex');
});
Route::post('/AdminLoginCtr', [AdminLoginCtr::class,'index']);

Route::get('/AdminMaintenanceCtr', [AdminMaintenanceCtr::class,'index']);

Route::get('/adminMaintenance', function () {
    return view('adminMaintenance');
});

Route::post('/adminInsert', function () {
    return view('adminInsert');
});

Route::post('/AdminOperationCtr', [AdminOperationCtr::class,'index']);

Route::get('/AdminLogoffCtr', [AdminLogoffCtr::class,'index']);