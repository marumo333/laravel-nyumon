<!-- タイトルを H1 タグで表示する -->
<h1>{{ $diary->title }}</h1>

<!-- 内容と日付を表示する -->
<div>
  <div>{{ $diary->body }}</div>
  <div>{{ $diary->date }}</div>
</div>
<div>
  <a href="{{ route('diary.edit', $diary->id) }}">
  更新
</a>
  {{-- 削除ボタン --}}
      <form action="{{ route('diary.destroy', $diary->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button
          type="submit"
          class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
        >
          削除
        </button>
      </form>
</div>
