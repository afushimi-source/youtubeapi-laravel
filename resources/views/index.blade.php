<!doctype html>
<html lang="ja">
<head>
  <title>Index</title>
  <link href="{{ mix('css/app.css') }}" rel = "stylesheet" type="text/css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body style="padding:10px;">
  <h1>Index</h1>
  <p>{{$id}}</p>
  <p>{{$max}}</p>
  <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>