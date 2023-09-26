<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\MultipleUploadController;
use App\Http\Controllers\EventsController;
use App\Http\Middleware\CheckApiTokenHall;

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

Route::post('hall/login',[LoginController::class, 'hallLogin'])->name('hallLogin');
Route::post('hall/register',[LoginController::class, 'hall_register']);


Route::group(['middleware' => [CheckApiTokenHall::class]], function(){
    Route::post('hallcreatepost',[PostController::class, 'createPostHall']);
    Route::get('hall/show_post',[PostController::class, 'showHallPosts']);
    Route::put ('updateHallProfile',[LoginController::class,'updateHallProfile']);//newwww

});
//imagecontroller
Route::post('hall/multiple-image-upload/{id}', [MultipleUploadController::class,'upload']);
//postconroller
Route::get('hall/showdetailsPosts/{id}',[PostController::class, 'showdetailsPosts']);
Route::delete('deletpost/{id}',[PostController::class, 'deletePostById']);
Route::put('updatepost/{id}',[PostController::class, 'updatePostById']);
//HallController
Route::get('hall/showHall',[HallController::class, 'showHall']);
Route::get('showProfileHall/{id}',[HallController::class, 'showProfileHall']);
Route::post('Calaner',[HallController::class, 'AddToCalanderHall']);

Route::get('get-hall',[HallController::class, 'getAllHall']);

Route::post('uploadImgHall', [MultipleUploadController::class,'uploadHall']);


Route::group(['middleware' => [CheckApiTokenHall::class , 'auth:hall-api']], function(){
    Route::get('hall/logout',[LoginController::class, 'logout_hall']);
   });
