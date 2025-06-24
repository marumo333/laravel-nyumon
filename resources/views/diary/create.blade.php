<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>日記を新規作成</title>
</head>
<body>
  <h1>日記を新規作成</h1>
<form method="POST" action="{{ route('diary.store') }}">
    @csrf
<!-- テキストボックスの記載例 -->
<div>
  <label for="title">タイトル：</label>
  <input type="text"
   id="title" 
   name="title"
   value="{{ old('title') }}"
   required
   >
</div>

<!-- テキストエリアの記載例 -->
<div>
  <label for="body">本文：</label>
  <textarea id="body" name="body" rows="4" cols="40"></textarea>
</div>
<div>
    <button type="submit">保存する</button>
</div>
</form>
</body>
</html>
