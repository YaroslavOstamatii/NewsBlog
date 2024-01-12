<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class EditController extends BaseController
{
    public function __invoke(Post $id)
    {
      return view('admin.posts.edit',['post'=>$id,'categories'=>Category::all(),'tags'=>Tag::all()]);
    }
}
