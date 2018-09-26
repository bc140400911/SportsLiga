<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    protected $guarded = ['id'];

    // Eloquent relation methods
    public function comment(){
        return $this->hasMany(Comment::Class);
    }
    public function notification(){
        return $this->hasMany(Notification::Class);
    }
    public function image(){
        return $this->hasMany(Image::Class);
    }

}
