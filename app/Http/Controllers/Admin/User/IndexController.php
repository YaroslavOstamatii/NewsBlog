<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;


class IndexController extends Controller
{
    public function __invoke()
    {
      return view('admin.users.index',['users'=>User::all()]);
    }
}
