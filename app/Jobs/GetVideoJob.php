<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Alaouy\Youtube\Facades\Youtube;
use App\Video;
use App\Channel;


class GetVideoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $max = 50;
      $tagIdList = array(
          '1' => 'Film & Animation',
          '2' => 'Autos & Vehicles',
          '10' => 'Music',
          '15' => 'Pets & Animals',
          '17' => 'Sports',
          '18' => 'Short Movies',
          '19' => 'Travel & Events',
          '20' => 'Gaming',
          '21' => 'Videoblogging',
          '22' => 'People & Blogs',
          '23' => 'Comedy',
          '24' => 'Entertainment',
          '25' => 'News & Politics',
          '26' => 'Howto & Style',
          '27' => 'Education',
          '28' => 'Science & Technology',
          '29' => 'Nonprofits & Activism',
          '30' => 'Movies',
          '31' => 'Anime/Animation',
          '32' => 'Action/Adventure',
          '33' => 'Classics',
          '34' => 'Comedy',
          '35' => 'Documentary',
          '36' => 'Drama',
          '37' => 'Family',
          '38' => 'Foreign',
          '39' => 'Horror',
          '40' => 'Sci-Fi/Fantasy',
          '41' => 'Thriller',
          '42' => 'Shorts',
          '43' => 'Shows',
          '44' => 'Trailers',
          
          );
      $datas = Youtube::getPopularVideos('jp',$max);
      $i=0;
      foreach($datas as $data){
        $i++;
        $video = new Video;
        $video->video_id = $data->id;
        $video->video_id = $data->id;
        $video->date = date("Y-m-d");
        $video->tag = $tagIdList[$data->snippet->categoryId];
        $video->title = $data->snippet->title;
        $title = $data->snippet->channelTitle;
        $video->channel = $title;
        $video->channel_id = $data->snippet->channelId;
        $channel = Channel::where('name',$title)->first();
        if(empty($channel))
        {
            $channel = new Channel;
            $channel->name = $title;
            $channel->count_rankIn = 1;
            $channel->channel_id = $data->snippet->channelId;
        }
        else
        {
            $channel = Channel::where('name',$title)->first();
            $channel->count_rankIn = $channel->count_rankIn + 1;
        }
        $channel->save();
        $video->rank = $i;
        $video->iframe = $data->player->embedHtml;
        $video->thumbnail = $data->snippet->thumbnails->high->url;
        $video->viewCount = $data->statistics->viewCount;
        if(isset($data->statistics->likeCount)){
            $video->likeCount = $data->statistics->likeCount;
        }else{
            $video->likeCount = 0;
        }
        if(isset($data->statistics->dislikeCount)){
            $video->dislikeCount = $data->statistics->dislikeCount;
        }else{
            $video->dislikeCount = 0;
        }
        if(isset($data->statistics->commentCount)){
            $video->commentCount = $data->statistics->commentCount;
        }else{
            $video->commentCount = 0;
        }
        $video->save();
      }
      echo $i . "件取得に成功";
    }
}
