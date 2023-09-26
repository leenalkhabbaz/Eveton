<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MultipleUploadController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CopunsController;
use App\Models\Day_of_book;
use App\Http\Controllers\ConversationController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('vendor/login',[LoginController::class, 'vendorLogin'])->name('vendorLogin');
Route::post('vendor/register',[LoginController::class, 'vendor_register']);


Route::group(['middleware' => [CheckApiTokenVendor::class]], function(){
    Route::post('vendor/create_post',[PostController::class, 'createPost']);
     Route::get('vendor/show_post',[PostController::class, 'showVendorPosts']);

     Route::put ('updateVendorProfile',[LoginController::class,'updateVendorProfile']);//newww

    // Route::post('send',[ConversationController::class,'send']);
});

Route::post('multiple-image-upload', [MultipleUploadController::class,'upload']);
//postcontroller
Route::get('vendor/showdetailsPosts/{id}',[PostController::class, 'showdetailsPosts']);
Route::delete('deletpost/{id}',[PostController::class, 'deletePostById']);
Route::put('updatepost/{id}',[PostController::class, 'updatePostById']);
//هي مو لفيندور محدد
Route::get('show_posts_offer',[PostController::class, 'showOfferPosts']);

Route::get('vendor/showProfile',[VendorController::class, 'showProfile']);
Route::get('profileVendorById/{id}',[VendorController::class, 'showProfileVendor']);
Route::post('Add_To_Calaner',[VendorController::class, 'AddToCalander']);
Route::get('vendor/showbooks',[BookController::class,'show_book']);
Route::get('vendor/acceptbook/{id}',[BookController::class,'accept_book']);
Route::get('vendor/fail_book/{id}',[BookController::class,'fail_book']);
Route::get('vendor/inprogress/{id}',[BookController::class,'inprogress']);//
Route::get('vendor/deleverd/{id}',[BookController::class,'deleverd_book']);//
Route::delete('vendor/certain_book/{id}',[BookController::class,'certain_book']);
Route::get('vendor/showbooksfilter/{id}',[BookController::class,'show_book_filter']);


Route::get('showuser',[CopunsController::class,'show_copuns']);
Route::post('usecopuns/{id}',[CopunsController::class,'use_copuns']);
Route::post('updateBook/{id}',[BookController::class,'updateBook']);
Route::delete('deleteBook/{id}',[BookController::class,'deleteBook']);
Route::get('show_book_event/{id}',[BookController::class,'show_book_event']);

Route::get('showCalander/{id}',[VendorController::class,'showCalander']);
/********************** */
Route::get('vendor/inprogresshall/{id}',[BookController::class,'inprogress_hall']);
Route::get('show_book_filter_hall/{id}',[BookController::class,'show_book_filter_hall']);
Route::get('show_book_hall',[BookController::class,'show_book_hall']);
/****************************** */
Route::group(['middleware' => [CheckApiTokenVendor::class , 'auth:vendor-api']], function(){
    Route::get('vendor/logout',[LoginController::class, 'logout_vendor']);
   // Route::post('chat/{id}',[ConversationController::class,'sendmessage']);
   });
