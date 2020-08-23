  
<!doctype html>
<html lang="ja">
<head>
  <title>youtube/video/Index</title>
  <link href="{{ mix('css/app.css') }}" rel = "stylesheet" type="text/css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body style="padding:10px;">
  @component('components.header')
  @endcomponent
  <h1>youtube/video/Index</h1>
  <div id="app">
    <get-video></get-video>
  </div>
  @component('components.footer')
  @endcomponent
  <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>