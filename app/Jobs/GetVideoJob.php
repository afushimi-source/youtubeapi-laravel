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
      $datas = Youtube::getPopularVideos('jp',$max);
      $i=0;
      foreach($datas as $data){
        $i++;
        $video = new Video;
        $video->video_id = $data->id;
        if(isset($data->id)){
            $video->video_id = $data->id;
        }else{
            $video->video_id = 0;
        }
        $video->date = date("Y-m-d");
        $video->title = $data->snippet->title;
        $title = $data->snippet->channelTitle;
        print($video->video_id);
        $video->channel = $title;
        $channel = Channel::where('name',$title)->first();

        if(empty($channel))
        {
            $channel = new Channel;
            $channel->name = $title;
            $channel->count_rankIn = 1;
        }
        else
        {
            $channel = Channel::where('name',$title)->first();
            $channel->id = $channel->id;
            $channel->name = $channel->name;
            $channel->count_rankIn = $channel->count_rankIn + 1;
        }
        $channel->save();
        $video->rank = $i;
        $video->iframe = $data->player->embedHtml;
        $video->thumbnail = $data->snippet->thumbnails->default->url;
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
