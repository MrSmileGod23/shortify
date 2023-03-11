<?php

use App\Http\Controllers\ChatApiController;
use App\Http\Controllers\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/chat', [ChatApiController::class, 'index']);
Route::post('/register',[UserApiController::class,'store']);
Route::post('/login',[UserApiController::class,'login']);
Route::get('/logout',[UserApiController::class,'logout']);
