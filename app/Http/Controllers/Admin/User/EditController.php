<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(User $id)
    {
      return view('admin.users.edit',['user'=>$id,'roles'=>User::getRoles()]);
    }
}
