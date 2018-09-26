<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Standing extends Model
{




    protected  $fillable =['name','season_id','played','team_id','tournament_id','draw','win','loss','total','goalsfor','goalsagainst','goalsdifference'];

    public function create($standings ,$season)
    {
        $ids = $this->getTournamentandTeamIds($standings['name']);
            self::updateOrCreate([
                'season_id'          => $this->getSeasonId($season),
                'team_id'            => $ids['team_id'],
                'tournament_id'      => $ids['tournament_id'],
                'name'               => isset($standings['name']) ? $standings['name']: null,
                'played'             => isset($standings['played']) ? $standings['played']: null,
                'draw'               => isset($standings['draw']) ? $standings['draw']: null,
                'win'                => isset($standings['win']) ? $standings['win']: null,
                'loss'               => isset($standings['loss']) ? $standings['loss']: null,
                'goalsfor'           => isset($standings['goalsfor']) ? $standings['goalsfor']: null,
                'goalsagainst'       => isset($standings['goalsagainst']) ? $standings['goalsagainst']: null,
                'goalsdifference'    => isset($standings['goalsdifference']) ? $standings['goalsdifference']: null,
                'total'              => isset($standings['total']) ? $standings['total']: null,
            ]);
    }
    function getSeasonId($seasonName)
    {
        $seasonInfo = Season::where('season', $seasonName)->first();
        $season_id = $seasonInfo['id'];
        return $season_id ;
    }

    function getTournamentandTeamIds($teamName)
    {
        $tournament = Team::where('name',$teamName)->first();
        $teamId = $tournament['id'];
        $tournament_id = $tournament['tournament_id'];
        return ['team_id'=>$teamId, 'tournament_id' => $tournament_id];
    }

    public function show()
    {
        $result =$this->all();
        return  $result;
    }

    public function findSeasonStandings($season)
    {
        $season_id  = $this->getSeasonId($season);
        $stadings = self::where('season_id',$season_id)->get();
        return $stadings;
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::Class);
    }
    //method use for api
    public function fetchAll(){
        $standing = self::All();
        return $standing;
}
    //method use for api
     public  function standingById($id)
     {
         $standing = self::findOrFail($id);
         return $standing;



     }
     public function standingByTeam($teamId){

        $standing = self::where("team_id",$teamId)->first();
        return $standing;
     }



    public function team()
    {
        return $this->belongsTo(Team::Class);
    }

    public function player()
    {
        return $this->belongsTo(Player::Class);
    }

    public function season()
    {
        return $this->belongsTo(season::Class);
    }
}
