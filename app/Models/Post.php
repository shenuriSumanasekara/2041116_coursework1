<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Images;

class Post extends Model
{
    use HasFactory;

    //1:m relationship with user and post
    public function user(){
        return $this->belongsTo(User::class);
    }

    //1:m relationship with comments and posts
    public function comments(){
        return $this -> hasMany(Comment::class);
    }
}
