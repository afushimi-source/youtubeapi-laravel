<!doctype html>
<html lang="ja">
<head>
  <title>youtube/find</title>
  <link href="{{ mix('css/app.css') }}" rel = "stylesheet" type="text/css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body style="padding:10px;">
  @component('components.header')
  @endcomponent
  <h1>youtube/find</h1>
  <h4>動画タイトル・ランキング・チャンネル名・日付（yyyy-mm-dd）・動画タグ（英語）での検索</h4>
  <div id="app">
    <finder></finder>
  </div>
  @component('components.footer')
  @endcomponent
  <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>