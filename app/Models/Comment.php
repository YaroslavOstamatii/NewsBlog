<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded=false;
//    public function post(){
//        return $this->belongsTo(Post::class);
//    }
    public function commentable()
    {
        return $this->morphTo();
    }
}
