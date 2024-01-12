<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;


class UpdateController extends Controller
{
    public function __invoke(User $id,UpdateRequest $updateRequest)
    {

        $data=$updateRequest->validated();
        $id->update($data);
      return view('admin.users.show',['user'=>$id]);
    }
}
