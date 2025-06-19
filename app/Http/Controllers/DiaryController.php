<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;     

class DiaryController extends Controller
{
    //
    public function index() {
    $diaries = Diary::all();
    $name = 'Laravel';
    return view('diary.index', compact('name','diaries'));
}
}
