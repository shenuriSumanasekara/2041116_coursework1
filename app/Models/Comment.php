<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $timestamps=false;

    //1:m relationship with users and comments
    public function user(){
        return $this->belongsTo(User::class);
    }

    //1:m relationship with posts and comments
    public function post(){
        return $this -> belongsTo(Post::class);
    }
}
