<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FishController;
use App\Http\Controllers\DepthController;

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


// Routes pour récupérer les infomations à partir des poissons.
Route::prefix('/fish')->group(function () {
    //Get 
    Route::get('/all', [FishController::class, 'GetAll']);
    Route::get('/{name}', [FishController::class, 'GetByName']);
    // Post
    Route::post('/add', [FishController::class, 'AddNewFish']);

    //NO WAY
    Route::fallback(function () {
        return "Error / 404 - NotFound";
    });
});

// Routes pour récupérer les poissons à partir de la profondeur
Route::prefix('/depth')->group(function() {
    //Get
    Route::get('/under/{value}', [DepthController::class, 'UnderValue']);
    Route::get('/over/{value}', [DepthController::class, 'OverValue']);
    Route::get('/between/{min}/{max}', [DepthController::class, 'BetweenValues']);

});


// Routes Not Found
Route::fallback(function () {
    return "Error / 404 - NotFound";
});