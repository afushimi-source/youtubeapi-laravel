<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;

class ChannelController extends Controller
{
  public function index()
  {
      return view('channel.index');
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
}
