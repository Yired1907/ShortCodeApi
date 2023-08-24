<?php

use App\Http\Controllers\api\CheckCodeController;
use App\Http\Controllers\api\GetCodeController;
use App\Http\Controllers\api\ShortCodeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ShortCodeController::class)->group(function () {
    Route::post('/get-code', 'getcode');
    Route::get('/check-code', 'checkcode');
});
