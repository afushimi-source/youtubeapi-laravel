# youtube-laravel+vue
this application is colllecting datas of youtube.

このアプリは毎日０時に急上昇というその時に人気のある動画を５０件取得し、DBに格納します。
急上昇というカテゴリは常に変動するので、後から確認しようとしても参照できません。
したがってDBに格納することでそれを実現し、そのデータが欲しい人のためにアプリを作成しました。

また、格納したデータをもとにグラフを描画させる。動画からその動画のチャンネルの詳細な情報を取得する。
といった、機能を作成しました。

目的とするユーザーはYOUTUBEで活動を行う人に向けて作成しました。

工夫した点としては、vue.jsを使い非同期でデータを取得し表示させるようにしたこと。
毎日決まった時間にデータを取得できるようにlaravelやcentosに設定させたこと。
ライブラリを使って、vue.jsでグラフを描画できるようにしたこと。
などがあげられます。

インストール方法
git clone https://github.com/afushimi-source/youtube-laravel-vue.git
composer install
npm i
npm run dev
php artisan key:generate
.envファイルでDB情報を記述
.envファイルにYOUTUBE_API＿KEYの記述
※https://github.com/alaouy/Youtube
(アプリケーション内で）
chmod -R 775 /storage
chmod -R 775 /bootstrap/cache
php artisan migrate

(crontabに１日ごとに実行してくれるようにする）
crontab -e
0 0 */1 * * php /var/www/(アプリ名）/artisan schedule:run
