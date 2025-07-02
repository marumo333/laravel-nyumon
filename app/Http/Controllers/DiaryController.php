<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;

class DiaryController extends Controller
{
    //
    public function index()
    {
        $diaries = Diary::all();
        $name = 'Laravel';
        return view('diary.index', compact('name', 'diaries'));
    }
    public function create()
    {
        return view('diary.create');
    }
    public function store(Request $request)
    {
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
    // app/Http/Controllers/DiaryController.php

public function show($id)
{
    // ID で検索。見つからなければ空のモデルを作成
    $diary = Diary::find($id);
    if (! $diary) {
        $diary = new Diary;
        $diary->date  = '';
        $diary->title = '';
        $diary->body  = '';
    }

    return view('diary.show', compact('diary'));
}
public function edit($id) {
  $diary = Diary::find($id);
  return view('diary.edit', compact('diary'));
}
    public function update(Request $request, $id) {
        // 更新対象となるデータを取得する
        $diary = Diary::find($id);

        // 入力値チェックを行う
        // タイトルは20文字以内、本文は400文字以内という制限を設ける
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400',
        ]);

        // チェック済みの値を使用して更新処理を行う
        $diary->update($validated);

        // 更新後、日記詳細ページにリダイレクトし、成功メッセージを表示
        return back()->with('message', '更新しました');
    }
}
