<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inning extends Model
{

    protected $guarded = ['id'];

    // Eloquent relation methods
    public function scoreBoard(){
        return $this->belongsTo(ScoreBoard::Class);
    }
    public function team(){
        return $this->belongsTo(Team::Class);
    }
}
