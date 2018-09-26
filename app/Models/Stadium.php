<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Image as Image;

class Stadium extends Model
{


    protected $table = 'stadiums';


    public function fetchAll()
    {
        $stadium = self::all();
        return $stadium;
    }
    public function store($data)
    {
        $image = new Image();
        $stadiums   = self::all();
        $count      = 0;
        $duplicate  = false;

        foreach ($data['teams'] as $stad){
            $duplicate            = false;
            $stadium              = new Stadium;
            $stadium->team_name   = $stad['strTeam'];
            $stadium->team_id     = getTeamId($stad['strTeam']);
            $stadium->name        = $stad['strStadium'];
            foreach ($stadiums as $s){

            if ($s->name == $stad['strStadium']){
                echo "Error! Stadium with name '$s->name' already Exists.\n Insertion terminated.\n";
               $duplicate  = true;
            }
            }
            if ($duplicate)
                continue;

            $stadium->description = $stad['strStadiumDescription'];
            $stadium->location    = $stad['strStadiumLocation'];
            $stadium->capacity    = $stad['intStadiumCapacity'];
            $stadium->save();
            $count++;
        }



        foreach ($data['teams'] as $teams) {
            if (preg_match('/stadium/i', $teams['strStadiumThumb'])) {
                $stadiumName = $this->getStadiumId($teams['strStadium']);
                $image_path= saveImages($teams['strStadiumThumb'],$stadiumName,'stadium','stadium');
                $image->insert($image_path,$stadiumName,'stadium','stadium');

            }
        }
        if ($duplicate)
            return;
     echo "Stadium's Record inserted successfully.\n";
     if ($count == 1)
     echo "Total $count stadium Record inserted.";
    elseif ($count > 1)
      echo "Total $count Stadiums inserted.";
    }

    public function totalStadium(){
        $totalStadiums = Stadium::count();
        return $totalStadiums;
    }

    function getStadiumId($stadiumName)
    {
        $stadiumInfo = Stadium::where('name', $stadiumName)->first();
        $stadium_id = $stadiumInfo['id'];
        return $stadium_id ;
    }
    function getTeamStadium($id){
        $stadium = self::where("team_id",$id)->first();
        return $stadium;

    }


    protected $guarded = ['id'];

    // Eloquent relation methods
    public function match()
    {
        return $this->belongsToMany(Match::Class);
    }

    public function image()
    {
        return $this->hasMany(Image::Class);
    }
    public function team(){
        return $this->belongsTo(Team::class);
    }
}
