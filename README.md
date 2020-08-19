# youtube-laravel+vue
this application is colllecting datas of youtube.

(task)
composer require alaouy/youtube

Configuration
In /config/app.php add YoutubeServiceProvider:

Alaouy\Youtube\YoutubeServiceProvider::class,
Do not forget to add also Youtube facade there:

'Youtube' => Alaouy\Youtube\Facades\Youtube::class,
Publish config settings:

$ php artisan vendor:publish --provider="Alaouy\Youtube\YoutubeServiceProvider"
Set your Youtube API key in the file:

/config/youtube.php
Or in the .env file

YOUTUBE_API_KEY = KEY
Or you can set the key programmatically at run time :

Youtube::setApiKey('KEY');
