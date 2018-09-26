<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScoreBoard extends Model
{
    protected $fillable =['id',
        'match_id',
        'team_one',
        'team_two',
        'team_one_score',
        'team_two_score',
        'result'];

    public function create($api,$api_id,$team_one_id,$team_two_id,$match_id,$season,$match_result)
    {
        if($team_one_id != null && $team_two_id != null && $match_id != null){
            $scoreboard = self::updateOrInsert([
                'api_id'          =>isset($api_id)                  ? $api_id : null,
                'match_id'        =>isset($match_id)                ? $match_id : null,
                'team_one'        =>isset($team_one_id)             ? $team_one_id : null,
                'team_two'        =>isset($team_two_id)             ? $team_two_id : null,
                'team_one_score'  =>isset($api['intHomeScore'])     ? $api['intHomeScore'] : null,
                'team_two_score'  =>isset($api['intAwayScore'])     ? $api['intAwayScore'] : null,
                'season'          =>isset($season)                  ? $season : null,
                'result'          =>isset($match_result)            ? $match_result : null
            ]);
            return $scoreboard;
        }


    }
    public function findMatch($id)
    {
        $match = Match::where('first_team',$id)->get();
        return $match;
    }
    public function findTeamName($id)
    {
        $match = Match::where('first_team',$id)->get();
        $firstTeam = $match->first_team;
        $secondTeam = $match->second_team;
        $FirstName = Team::select('name')->where('id',$firstTeam)->first();
        $SecondName = Team::select('name')->where('id',$secondTeam)->first();
        $array = array($FirstName,$SecondName);
        return $array;
    }

    public function findTeamScore($team)
    {
        $score = self::where('team_one',$team)->get();
        return $score;
    }
    public function showScore()
    {
        $data = ScoreBoard::all();
        return $data;
    }

    public function showMatch()
    {
        $data = Match::all();
        return $data;
    }

    public function findMatchScore($team)
    {
        $score = self::where('team_one',$team)->get();
        return $score;
    }
    public function showTeam()
    {
        $data = Team::all();
        return $data;
    }
    public function teamScore($id){
        $result = self::where('team_one', $id)->orWhere('team_two', '=', $id)->get();
        return $result;
    }

    protected $guarded = ['id'];

    // Eloquent relation methods
    public function team()
    {
        return $this->belongsToMany(Team::Class);
    }

    public function player()
    {
        return $this->belongsTo(Player::Class);
    }

    public function card()
    {
        return $this->hasMany(Card::Class);
    }

    public function goal()
    {
        return $this->hasMany(Goal::Class);
    }

    public function inning()
    {
        return $this->hasMany(Inning::Class);
    }
}
