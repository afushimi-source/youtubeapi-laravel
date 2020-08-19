  
<!doctype html>
<html lang="ja">
<head>
  <title>Index</title>
  <link href="{{ mix('css/app.css') }}" rel = "stylesheet" type="text/css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body style="padding:10px;">
  <h1>youtube/video/Index</h1>
  <div id="app">
    <get-video></get-video>
  </div>
  <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>