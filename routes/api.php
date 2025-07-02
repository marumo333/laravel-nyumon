<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiDiaryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('diary',        [ApiDiaryController::class, 'index']);  // 一覧取得
Route::get('diary/{id}',   [ApiDiaryController::class, 'show']);   // 単一取得