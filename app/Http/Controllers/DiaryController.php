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
public function create()
{
    return view('diary.create');
}
public function store(Request $request) {
  // <input name="title"...> で指定された内容を取得する
  $title = $request->input('title');
  $body = $request->input('body');
  // 入力内容を validate メソッドを使って精査する
$validated = $request->validate([
    'title' => 'required|max:20',    // title は入力必須、かつ 20文字以内 
    'body' => 'required|string',            // body は入力必須
]);

// 精査済みのデータを利用する
$title = $validated['title'];
// 新しい Diary モデルインスタンスを作成
$diary = new Diary();

$diary->date = date("Y-m-d");           // 現在の日付をセット
$diary->title = $validated['title'];    // 保存する項目をセット
$diary->body = $validated['body'];

// データベースに保存
$diary->save();


        // 一覧ページへリダイレクト（302 を返す）
        return redirect()->route('diary.index')
                         ->with('message', '保存しました');
}
}
