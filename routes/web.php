<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;

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


Route::get('/',function(){
    return redirect('login');
});

Route::get('login', [AuthenticationController::class,"login"]);

Route::get('register',[AuthenticationController::class,"register"]);

Route::post('signup',[AuthenticationController::class,'signup'])->name('signup');

Route::post('login_user',[AuthenticationController::class,'login_user'])->name('login-user');

Route::get('/dashboard',[HomepageController::class,'homepage'])->middleware('isLoggedIn');
Route::get('/editprofile',[HomepageController::class,'editprofile'])->middleware('isLoggedIn');
Route::post('/editprofile/{id}',[HomepageController::class,'updateprofile'])->middleware('isLoggedIn')->name("editprofile");

Route::get('logout',[AuthenticationController::class,'logout']);

Route::Resource('employee',EmployeeController::class)->middleware('isLoggedIn');

Route::get('forgot',[AuthenticationController::class,'forgot']);

Route::get('password_reset/{id}',[AuthenticationController::class,'password_reset'])->name('password_reset');

Route::post('forgot_email',[AuthenticationController::class,'forgot_email'])->name('forgot_email');
Route::post('change_password',[AuthenticationController::class,'change_password'])->name('change_password');

Route::Resource('admin/user',UserController::class)->middleware('AdminAuth');

Route::get('admin',function(){
    return redirect('admin/login');
});
Route::get('admin/login', [AdminController::class, 'login']);
Route::post('admin/login', [AdminController::class, 'check_login'])->name("admin/login");
Route::get('admin/logout',[AdminController::class,'logout']);
