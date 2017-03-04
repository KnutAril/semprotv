<?php

namespace App\Http\Controllers\Video;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Get extends BaseController
{
    public function listVideos($numOfVideos=9)
    {
    	$videos = DB::table('video')->paginate($numOfVideos);

        return view('welcome', ['videos' => $videos]);
    }
}
