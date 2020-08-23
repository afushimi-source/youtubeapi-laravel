  
<!doctype html>
<html lang="ja">
<head>
  <title>youtube/channel/index</title>
  <link href="{{ mix('css/app.css') }}" rel = "stylesheet" type="text/css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body style="padding:10px;">
  @component('components.header')
  @endcomponent
  <h1>youtube/channel/Index</h1>
  <div id="app">
    <channel></channel>
  </div>
  @component('components.footer')
  @endcomponent
  <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>