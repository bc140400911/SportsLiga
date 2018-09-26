<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $guarded = ['id'];

    public function fetchAll(){
        $sport = self::all();
        return $sport;
    }

    public function insert($result)
    {
        $sport = self::updateOrCreate([
            'name' => isset($result['strSport']) ? $result['strSport'] : null
        ]);
        return $sport->id;
    }


    // Eloquent relation methods
    public function tournament()
    {
        return $this->hasMany(Tournament::Class);
    }
}
