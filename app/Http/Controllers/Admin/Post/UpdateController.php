<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;


class UpdateController extends BaseController
{
    public function __invoke(Post $id,UpdateRequest $updateRequest)
    {
        $data=$updateRequest->validated();
        $id=$this->service->update($id,$data);
        return view('admin.posts.show',['post'=>$id]);
    }
}
