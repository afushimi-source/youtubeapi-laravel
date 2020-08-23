<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;
use App\Channel;

class ChannelController extends Controller
{
  public function index()
  {
      return view('youtube.channel.index');
  }
    
  public function json($date = -1)
  {
    	if($date == -1)
    	{
    		return Channel::orderBy('count_rankIn','DESC')->get()->toJson();
    	}
    	else
    	{
    		return Channel::where('date',$date)->take(30)->get()->toJson();
    	}
  }
  
  public function detailInfo($id = -1)
  {
    $max = 10;
    $cha = Youtube::getChannelById($id);
    $video_list = $activities = Youtube::getActivitiesByChannelId($id, $part = ['id', 'snippet', 'contentDetails'], $maxResults = $max);
    #dd($cha);
    foreach($video_list as $value){
      $list_thumbnails[] = $value->snippet->thumbnails->high->url;
      $list_title[] = $value->snippet->title;
    }
    $data = array(
      'thumbmail' => $cha->snippet->thumbnails->high->url,
      'title' => $cha->snippet->title,
      'description' => str_replace("\n","<br>",$cha->snippet->description),
      'created_at' => $cha->snippet->publishedAt,
      'subscriber' => $cha->statistics->subscriberCount,
      'viewCount' => $cha->statistics->viewCount,
      'videoCount' => $cha->statistics->videoCount,
      'list_thumbnail' => $list_thumbnails,
      'list_title' => $list_title,
      );
    return view('channel.detail',$data);
  }
}
