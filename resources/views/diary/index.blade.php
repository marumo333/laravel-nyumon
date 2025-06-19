<html>
<body>
Hello, {{ $name }}
</body>
</html>
@foreach($diaries as $diary)
<div>
  <div>{{ $diary->date }}</div>
  <div>{{ $diary->title }}</div>
</div>
@endforeach
