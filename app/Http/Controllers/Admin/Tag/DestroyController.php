<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class DestroyController extends Controller
{
    public function __invoke(Tag $id)
    {
        $id->delete();
      return redirect()->route('admin.tag.index');
    }
}
