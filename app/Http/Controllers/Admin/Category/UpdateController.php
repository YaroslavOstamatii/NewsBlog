<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;


class UpdateController extends Controller
{
    public function __invoke(Category $id,UpdateRequest $updateRequest)
    {
        $data=$updateRequest->validated();
        $id->update($data);
      return view('admin.categories.show',['category'=>$id]);
    }
}
