<?php

namespace App\Http\Controllers\Video;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Get extends BaseController
{
    public function listVideos($numOfVideos=9, $category='')
    {
    	if ($category == '')
    	{
    		$videos = DB::table('video')->paginate($numOfVideos);
    	}
    	else
    	{
    		$videos = DB::table('video')->where('category', '=', $category)->paginate($numOfVideos);
    	}

        return view('welcome', ['videos' => $videos]);
    }

    public function searchVideos($numOfVideos=9, $title)
    {
    	$videos = DB::table('video')->where('title', '=', $title)->paginate($numOfVideos);
    	
        return view('welcome', ['videos' => $videos]);
    }

    public function archiveVideos($numOfVideos=9, $date)
    {
    	$videos = DB::table('video')->where('publishdate', '=', $date)->paginate($numOfVideos);
    	
        return view('welcome', ['videos' => $videos]);
    }
}
