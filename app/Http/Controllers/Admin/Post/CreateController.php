<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke()
    {
      return view('admin.posts.create',['categories'=>Category::all(),'tags'=>Tag::all()]);
    }
}
