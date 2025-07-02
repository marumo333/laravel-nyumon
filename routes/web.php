<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiaryController;

Route::get('/diary', [DiaryController::class, 'index'])->name('diary.index');
Route::get('/diary/create',[DiaryController::class,'create'])->name('diary.create');
Route::post('/diary',[DiaryController::class,'store'])->name('diary.store');
Route::get('/diary/{id}', [DiaryController::class,'show'])->name('diary.show');
// 編集画面を表示
Route::get('/diary/{id}/edit', [DiaryController::class, 'edit'])->name('diary.edit');
// 更新を実行
Route::patch('/diary/{id}', [DiaryController::class, 'update'])->name('diary.update');
