<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CopunsController;
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

Route::post('user/login',[LoginController::class, 'userLogin'])->name('userLogin');
Route::post('user/register',[LoginController::class, 'user_register']);


Route::group( ['prefix' => 'user','middleware' => ['auth:user-api','scopes:user'] ],function(){
   // authenticated staff routes here
    Route::get('dashboard',[LoginController::class, 'userDashboard']);


});
Route::group(['middleware' => [CheckApiToken::class]], function(){
    Route::get('get_all_events',[EventsController::class, 'show']);
Route::post('create_events',[EventsController::class, 'create']);
Route::get('event-id/{id}',[EventsController::class, 'event_id']);//
Route::post('create_book/{id}',[BookController::class, 'create_book']);
Route::get('vendor/showbooks_user/{id}',[BookController::class,'show_book_user']);//


Route::post('addevents',[UserController::class, 'createEvent']);
Route::get('showProfile',[UserController::class, 'showProfile']);


});
Route::put ('updateUserProfile',[LoginController::class,'updateUserProfile']);//newwwwww

Route::post('favoritepost',[UserController::class, 'addPostToFavorite']);
Route::post('unsave',[UserController::class, 'unsavePost']);

Route::post('review-user-by-id', [UserController::class, 'reviewVendorById']);

Route::get('showsave',[UserController::class, 'showSavePost']);

Route::post('report-by-id', [UserController::class, 'reportById']);
Route::post('report-user-by-id', [UserController::class, 'reportUserById']);
Route::post('rating-by-id', [UserController::class, 'rateById']);
Route::get('showEventById/{id}',[UserController::class, 'showEventById']);
Route::get('getAllEventUser',[UserController::class, 'getAllEventUser']);
Route::post('AddToGusts/{id}',[UserController::class, 'AddToGusts']);
Route::get('get-vendor-bytype/{type}',[UserController::class, 'getVendorByType']);
Route::put('updategust/{id}',[UserController::class, 'updateGusts']);
Route::delete('deletegust/{id}',[UserController::class, 'deleteGust']);


Route::post('search',[UserController::class, 'search']);//newww
Route::put('updateEvent/{id}',[UserController::class, 'updateEventById']);/////////////////////
Route::get('showGustsbyIDevent/{id}',[UserController::class, 'showGustsbyIDevent']);///////


//Route::post('CreatePublicity',[AdminController::class, 'CreatePublicity']);
Route::post('getUserProfile',[UserController::class, 'getUserProfile']);//neww
Route::get('showPublicity',[UserController::class, 'showPublicity']);//newww

Route::get('user/usercopuns',[CopunsController::class,'user_copons']);
Route::post('user/active',[CopunsController::class,'activecopun']);
Route::post('user/usecopun/{id}',[CopunsController::class,'use_copons']);

Route::group(['middleware' => [CheckApiToken::class , 'auth:user-api']], function(){
 Route::get('user/logout',[LoginController::class, 'logout']);

});

Route::post('box',[ConversationController::class,'getmessage']);
Route::post('get_message/{id}',[ConversationController::class,'gett']);
Route::post('chat/{id}',[ConversationController::class,'sendmessage']);
 Route::post('send',[ConversationController::class,'send']);

 //Route::get('isbuy/{id}',[BookController::class,'isbuy']);
// Route::post('sendvendor',[ConversationController::class,'sendvendor']);
