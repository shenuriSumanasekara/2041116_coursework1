<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    use HasFactory;


    //1:1 relationship with user and mobile
    public function user(){
        return $this->belongsTo(User::class);
    }
}
