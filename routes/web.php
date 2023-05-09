<?php

use App\Http\Controllers\AdminLoginCtr;
use App\Http\Controllers\AdminLogoffCtr;
use App\Http\Controllers\AdminMaintenanceCtr;
use App\Http\Controllers\ReserveCtr;
use App\Http\Controllers\ShowMenuCtr;
use App\Http\Controllers\UserAccountCtr;
use App\Http\Controllers\UserOperationCtr;
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

//admin関連
Route::get('/adminLogin', function () {
    if(session()->get("adminInfo") == null){
        return view('adminLogin');
    }else{
        return view('adminIndex');
    }
    
});

Route::get('/adminIndex', function () {
    return view('adminIndex');
});
Route::post('/AdminLoginCtr', [AdminLoginCtr::class,'index']);

Route::get('/adminMaintenance', [AdminMaintenanceCtr::class,'showAdminList']);

Route::post('/AdminOperation', [AdminMaintenanceCtr::class,'operation']);

Route::get('/AdminLogoffCtr', [AdminLogoffCtr::class,'index']);


//user関連
Route::get('/userLogin', function () {
    if(session()->get("userInfo") == null){
        return view('userLogin');
    }else{
        return view('userIndex');
    }
    
});

Route::get('/userIndex', function () {
    return view('userIndex');
});

Route::get('/userInsert', function () {
    return view('userInsert');
});

Route::get('/userUpdate', function () {
    return view('userUpdate');
});

Route::get('/userDelete', function () {
    return view('userDelete');
});
Route::post('/userLoginCtr', [UserAccountCtr::class,'login']);

Route::post('/userOperation', [UserOperationCtr::class,'operation']);

Route::get('/userLogoffCtr', [UserAccountCtr::class,'logoff']);

Route::get('/reserve', [ReserveCtr::class,'reserveList']);

//メニュー一覧関連
Route::get('/showMenu', [ShowMenuCtr::class,'index']);

//メンテナンス（作成中 or 改修中）
Route::get('/sorry', function () {
    return view('app_maintenance');
});