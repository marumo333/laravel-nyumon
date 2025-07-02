<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Diary;


class ApiDiaryController extends Controller
{
    //
    /**
     * 全日記を JSON で返す
     */
    public function index()
    {
        $diaries = Diary::all();
        return response()->json($diaries);
    }

    /**
     * 単一日記を JSON で返す
     */
    public function show($id)
    {
        $diary = Diary::findOrFail($id);
        return response()->json($diary);
    }
}
