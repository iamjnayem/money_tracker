<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackerController;
use App\Http\Controllers\TrackerInfoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentMethodController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
   return $request->user();
});

Route::group(['prefix' => 'tracker'], function(){
    Route::get('/',[TrackerController::class, 'index']);
    Route::post('/{user_id}', [TrackerController::class, 'store']);
    Route::get('/searchTracker/{name}', [TrackerController::class, 'searchTracker']);
    Route::delete('/{id}', [TrackerController::class, 'delete']);
    Route::patch('/{id}', [TrackerController::class, 'update']);
});


Route::group(['prefix' => 'tracker_info'], function(){
    Route::get('/', [TrackerInfoController::class, 'index']);
    Route::post('/', [TrackerInfoController::class, 'store']);
    Route::get('/{id}', [TrackerInfoController::class, 'show']);
    Route::delete('/{id}', [TrackerInfoController::class, 'delete']);
    Route::patch('/{id}', [TrackerInfoController::class, 'update']);
    Route::get('/report/{report_type}/{filter_type}', [TrackerInfoController::class, 'report']);
    Route::get('/filter/{id}/{filter_type}', [TrackerInfoController::class, 'filter']);
});


Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category', [CategoryController::class, 'store']);
Route::post('/category/{id}', [CategoryController::class, 'delete']);


Route::get('/payment_method', [PaymentMethodController::class, 'index']);
Route::post('/payment_method', [PaymentMethodController::class, 'store']);
Route::post('/payment_method/{id}', [PaymentMethodController::class, 'delete']);
