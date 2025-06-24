<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiaryController;

Route::get('/diary', [DiaryController::class, 'index'])->name('diary.index');
Route::get('/diary/create',[DiaryController::class,'create'])->name('diary.create');
Route::post('/diary',[DiaryController::class,'store'])->name('diary.store');
Route::get('/diary/{id}', [DiaryController::class,'show'])->name('diary.show');
