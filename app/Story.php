<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    public function author(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
