<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{

//    public function __construct()
//    {
//
//    }
public function index(){
    $goals = self::all();
    return $goals;
}
    protected $fillable =['id',
        'team_id',
        'match_id',
        'player_name',
        'min'];

    public function create($teamId, $matchId, $playerName, $min)
    {
        if($teamId != null && $matchId != null && $playerName != null) {
            $goals = self::updateOrCreate([
                'team_id'      =>isset($teamId)             ? $teamId : null,
                'match_id'    =>isset($matchId)           ? $matchId : null,
                'player_name'    =>isset($playerName)           ? $playerName : null,
                'min'          =>isset($min)                ? $min : null
            ]);
            return $goals;
        }

    }
public function show($teamID){
        $teamGoals = self::where('team_id',$teamID);
        return $teamGoals;
}

    protected $guarded = ['id'];

    // Eloquent relation methods
    public function team(){
        return $this->belongsTo(Team::Class);
    }
    public function scoreBoard(){
        return $this->belongsTo(ScoreBoard::Class);
    }
    public function player(){
        return $this->belongsTo(Player::Class);
    }
}
