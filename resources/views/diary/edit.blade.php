{{-- resources/views/diary/edit.blade.php --}}
  <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">日記を編集</h1>

    {{-- $diary はコントローラで渡されている想定 --}}
    <form action="{{ route('diary.update', $diary->id) }}" method="POST" class="space-y-4">
      {{-- タイトル入力 --}}
      <div>
        <label for="title" class="block font-medium">タイトル</label>
        <input
          type="text"
          id="title"
          name="title"
          value="{{ old('title', $diary->title) }}"
          class="w-full border rounded px-3 py-2"
          required
        >
      </div>

      {{-- 本文入力 --}}
      <div>
        <label for="body" class="block font-medium">本文</label>
        <textarea
          id="body"
          name="body"
          rows="6"
          class="w-full border rounded px-3 py-2"
          required
        >{{ old('body', $diary->body) }}</textarea>
      </div>

      {{-- 更新ボタン --}}
      <div>
        <button
          type="submit"
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
        >
          更新する
        </button>
      </div>
    </form>
  </div>
