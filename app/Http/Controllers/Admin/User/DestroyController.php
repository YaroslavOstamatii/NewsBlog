<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class DestroyController extends Controller
{
    public function __invoke(User $id)
    {
        $id->delete();
      return redirect()->route('admin.user.index');
    }
}
