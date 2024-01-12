<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;


class ShowController extends Controller
{
    public function __invoke(User $id)
    {

      return view('admin.users.show',['user'=>$id]);
    }
}
