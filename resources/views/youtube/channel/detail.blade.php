<!doctype html>
<html lang="ja">
<head>
  <title>youtube/channel/detail</title>
  <link href="{{ mix('css/app.css') }}" rel = "stylesheet" type="text/css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body style="padding:10px;">
  @component('components.header')
  @endcomponent
  <h1>youtube/channel/detail</h1>
  <hr>
  <div class="title-wrapper">
    <img src={{$thumbmail}} width="120" height="120">
    <h2>{{$title}}</h2>
  </div>
  <h4>チャンネル登録者数 {{$subscriber}}人</h4>
  <p>{!!$description!!}</p>
  <h4>チャンネル開設日：{{$created_at}}</h4>
  <h4>総動画数：{{$videoCount}}</h4>
  <h4>総再生回数：{{$viewCount}}</h4>
  <hr>
  <h3>動画リスト</h3>
  @for($i=0; $i<10; $i++)
  <div class="video_wrapper">
    <img src="{{$list_thumbnail[$i]}}" width="480" height="360">
    <h4>{{$list_title[$i]}}</h4>
  </div>
  @endfor    
  </div>
  <style>
      .title-wrapper{
        display: flex;
      }
      .title-wrapper h2{
        margin: 45px 20px;
      }
      .video_wrapper{
          margin-bottom: 30px;
      }
  </style>
  @component('components.footer')
  @endcomponent
  <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>