  <!doctype html>
<html lang="ja">
<head>
  <title>description</title>
  <link href="{{ mix('css/app.css') }}" rel = "stylesheet" type="text/css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body style="padding:10px;">
  @component('components.header')
  @endcomponent
  <h1>description</h1>
  <h3>説明</h3>
  <p>毎日、０時頃にyoutubeのその瞬間における急上昇を取得します</p>
  <p>そのデータをもとにグラフの描画、動画の検索といった機能を作成しました</p>
  <p class="last">ぜひyoutubeでの活動にご活用ください</p>
  @component('components.footer')
  @endcomponent
  <style>
      p{
          padding: 30px 0;
      }
      .last{
          margin-bottom: 200px;
      }
  </style>
  <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>