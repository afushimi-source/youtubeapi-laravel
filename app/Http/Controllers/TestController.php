<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;
 
class TestController extends Controller
{
    public function index(){
        $id = "UCaak9sggUeIBPOd8iK_BXcQ";
        $datas = Youtube::getChannelById($id);
        $channel[] = Youtube::getActivitiesByChannelId($id, $part = ['id', 'snippet', 'contentDetails'], $maxResults = 10);
        dd($channel);
        $des = $datas->snippet->description;
        $des = str_replace("\n","<br>",$des);
        return view('index', ['msg' => $des]);
    }
    
    public function get_query($id,$max = 5)
    {
        $datas = [
            'id' => $id,
            'max' => $max,
            ];
        return view('index',$datas);
    }
}
