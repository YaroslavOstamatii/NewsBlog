<?php

namespace App\Http\Controllers\Personal\Like;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts=auth()->user()->likedPosts;
        return view('personal.liked.index',['posts'=>$posts]);
    }
}
