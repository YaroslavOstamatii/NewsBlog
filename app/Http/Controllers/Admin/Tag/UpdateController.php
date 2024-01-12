<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;


class UpdateController extends Controller
{
    public function __invoke(Tag $id,UpdateRequest $updateRequest)
    {
        $data=$updateRequest->validated();
        $id->update($data);
      return view('admin.tags.show',['tag'=>$id]);
    }
}
