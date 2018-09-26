<?php

namespace App\Models;

use App\Http\Controllers\teamController;
use Illuminate\Database\Eloquent\Model;
class Match extends Model
{


    public function store($data){
    $matches             = self::all();
    $updated             = false;
    $recordCount         = 0;
    $duplicate           = false;
    foreach ($data['events'] as $event){
    $match               = new Match;
    $match->api_id       = $event['idEvent'];
    foreach ($matches as $m){
        if ($m->api_id == $event['idEvent']){
            echo "Error! Match with Id $m->api_id Already exists.\n This Match can't be inserted.\n";
            $duplicate   = true;

        }
    }

       if(getTeamId($event['strHomeTeam']) != null && getTeamId($event['strAwayTeam']) != null){



    if ($duplicate)
        continue;
    $match->first_team   = getTeamId($event['strHomeTeam']);
    $match->second_team  = getTeamId($event['strAwayTeam']);
    $match->tournament_id= getTournamentId($event['strHomeTeam']);
    $match->first_team_name = $event['strHomeTeam'];
    $match->second_team_name = $event['strAwayTeam'];
    $match->date         = $event['dateEvent'];
    $match->start_date   = $event['strDate'];
    $match->spectators   = $event['intSpectators'];
    $match->season       = $event['strSeason'];
    $match->round        = $event['intRound'];
    $match->start_time   = date('h:i:s', strtotime($event['strTime']));
    $match->saveOrFail();
    $recordCount++;
    $updated              = true;
        }
    }
    if ($updated)
        echo "Match Records inserted successfully.\n";
    if($recordCount == 1)
        echo "Total $recordCount Match inserted.\n";
    elseif ($recordCount > 1)
        echo "Total $recordCount Matches inserted.\n";
}


    public function show()
    {
    $matches =  Match::all();
    return $matches;
    }

    function getMatches($id)
    {
        $team = Match::where('first_team', $id)->orWhere('second_team', '=', $id)->get();
        return $team;
    }


    // Eloquent relation methods
    public function team(){
      return  $this->belongsTo(Team::Class);
    }
    public function stadium(){
        return  $this->belongsTo(Stadium::CLass);
    }
    public function comment(){
        return $this->hasMany(Comment::Class);
    }
    public function image(){
        return  $this->hasMany(Image::Class);
    }

    public function tournament(){
        return  $this->belongsTo(Tournament::Class);
    }

}
