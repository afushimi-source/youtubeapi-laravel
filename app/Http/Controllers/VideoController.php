<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class VideoController extends Controller
{
    public function index()
    {
      return view('youtube.video.index');
    }
  
    public function json_desc($date = -1)
	{
    	if($date == -1)
    	{
    		return Video::orderBy('rank','DESC')->take(50)->get()->toJson();
    	}
    	else
    	{
    		return Video::where('date',$date)->orderBy('rank','DESC')->take(50)->get()->toJson();
    	}
    }
  	 public function json_asc($date = -1)
	{
    	if($date == -1)
    	{
    		return Video::orderBy('rank','ASC')->take(50)->get()->toJson();
    	}
    	else
    	{
    		return Video::where('date',$date)->orderBy('rank','ASC')->take(50)->get()->toJson();
    	}
  }
}
