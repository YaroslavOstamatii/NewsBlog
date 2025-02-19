<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class EditController extends Controller
{
    public function __invoke(Category $id)
    {
      return view('admin.categories.edit',['category'=>$id]);
    }
}
