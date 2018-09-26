<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $guarded = ['id'];

    public function insert($season,$tournament)
    {
        $season = self::updateOrCreate([
           'tournament_id' => $tournament->id,
            'season'       => $season
        ]);
    }

    public function getSeason(){
        $season = self::all();
        return $season;
    }

    function getSeasonId($seasonName)
    {
        $seasonInfo = Season::where('name', $seasonName)->first();
        $season_id = $seasonInfo->id;
        return $season_id ;
    }
    function show($id)
    {
        $result = self::where('tournament_id',$id)->orderBy('id', 'DESC')->get();
        return $result;
    }
    public function tournament()
    {
        return $this->belongsTo(Tournament::Class);
    }
    public function standing()
    {
        return $this->hasOne(Standing::Class);
    }
}
