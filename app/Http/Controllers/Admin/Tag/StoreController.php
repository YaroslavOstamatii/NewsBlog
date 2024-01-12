<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Models\Tag;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $storeRequest)
    {
      $data=$storeRequest->validated();
      Tag::firstOrCreate($data);

      return redirect()->route('admin.tag.index');
    }
}
