<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Authh\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CopunsController;

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

// Route :: get('/laravel',function (){

//     if(auth()->guard('admin')->user()) return view('View-Posts');
// });

Route::get('/mm', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/showpost',[AdminController::class, 'showAdminPost']);
//Hall
Route::get('/showreportHall',[AdminController::class, 'showAdminReportHall']);
Route :: put('/hall/{reportID}/{hallID}',[AdminController :: class ,'blockHall']);
Route :: delete('/reportHall/{reportID}/ignorHall',[AdminController :: class ,'ignoreHall']);

Route::get('/showadmin',[AdminController::class, 'showAdmin']);
//////new
Route::get('/showAdminUsers',[AdminController::class, 'showAdminUsers']);
Route::post('/users',[AdminController::class, 'showAdminUsersSearch']);

Route::get('/showAdminvendors',[AdminController::class, 'showAdminvendors']);
Route::post('/vendors',[AdminController::class, 'vendorSearch']);

Route::get('/showAdminHalls',[AdminController::class, 'showAdminHalls']);
Route::post('/halls',[AdminController::class, 'hallSearch']);
////new

Route :: put('/posts/{postID}/accepted',[AdminController :: class ,'acceptPost']);//approve a user application
Route :: delete('/posts/{postID}/Refuse',[AdminController :: class ,'ignorePost']);//ignore a user application
Route::post('publicities',[AdminController::class, 'CreatePublicity']);
Route::get('/showpublicities',[AdminController::class, 'showAdminPublicities']);
//user
Route::get('/showreport',[AdminController::class, 'showAdminReport']);
Route :: put('/report/{reportID}/{userID}/forbiddin',[AdminController :: class ,'blockUser']);
Route :: delete('/reportUser/{reportID}/ignorUser',[AdminController :: class ,'ignoreUser']);

//vendor
Route::get('/showreportVendor',[AdminController::class, 'showAdminReportVendor']);
Route :: put('/vendor/{reportID}/{vendorID}',[AdminController :: class ,'blockVendor']);
Route :: delete('/report/{reportID}/ignor',[AdminController :: class ,'ignoreVendor']);


Route::get('/showa',[AdminController::class, 'showA']);
Route::get('/showcopon',[AdminController::class, 'showAdminCopon']);
Route::post('copon',[CopunsController::class,'create_copun']);




Auth::routes();
