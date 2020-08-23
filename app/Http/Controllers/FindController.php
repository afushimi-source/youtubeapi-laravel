<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Channel;

class FindController extends Controller
{
  public function index()
  {
    return view('youtube.find');
  }
  
  public function find($str)
  {
    return Video::where('title','like','%' . $str . '%')
                 ->orWhere('date','like','%' . $str . '%')
                 ->orWhere('tag','like','%' . $str . '%')
                 ->orWhere('channel','like','%' . $str . '%')
                 ->orWhere('rank','like','%' . $str . '%')
                 ->get()->toJson();
  }
}
