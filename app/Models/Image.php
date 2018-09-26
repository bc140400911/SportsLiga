<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $guarded = ['id'];


    public function insert($path,$id,$about,$type)
    {

          $image = self::updateOrCreate([
                $about."_id"  => isset($id) ? $id : null,
                "type"        => isset($type) ? $type : null,
                "image"       => isset($path) ? $path : null
          ]);
          return $image;


    }
    public function getStadiumImg($stdId){
        $imageRow = self::where('stadium_id', $stdId)->first();
        $stdImage = $imageRow["image"];
        return $stdImage;

    }

    // Eloquent relation methods
   public function tournament(){
       return $this->belongsTo(Tournament::Class);
   }

   public function team(){
       return $this->belongsTo(Team::Class);
   }

   public function player(){
       return $this->belongsTo(Player::Class);
   }

   public function match(){
       return $this->belongsTo(Match::Class);
   }

   public function stadium(){
       return $this->belongsTo(Stadium::Class);
   }
   public function news(){
       return $this->belongsTo(News::Class);
   }

   public function user(){
       return $this->hasOne(User::Class);
   }
}
