<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;


class ShowController extends BaseController
{
    public function __invoke(Post $id)
    {

      return view('admin.posts.show',['post'=>$id]);
    }
}
