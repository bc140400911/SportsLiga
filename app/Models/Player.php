<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Unirest\Request;


class Player extends Model
{
    protected $fillable =['player_id',
        'player',
        'api_id',
        'team_id',
        'team_name',
        'name',
        'description',
        'age',
        '$date_of_signing',
        '$bowling_style',
        '$date_of_birth',
        '$test_debut',
        '$odi_debut',
        '$t20_debut',
        '$birth_place',
        '$position',
        '$nationality',
        '$height',
        'weight',
        'income',
        'twitter',
        'instagram',
        'facebook',
        'thumb_pic',
        'profile_pic'];

    public function fetchAll(){
        $players = self::all();
        return $players;
    }
    public function create($api,$team_id)
    {
        $player = self::updateOrInsert([
            'team_id'          =>isset($team_id)                 ? $team_id : null,
            'api_id'           =>isset($api['idPlayer'])          ? $api['idPlayer'] : null,
            'team_name'        =>isset($api['strTeam'])          ? $api['strTeam'] : null,
            'name'             =>isset($api['strPlayer'])        ? $api['strPlayer'] : null,
            'description'      =>isset($api['strDescriptionEN']) ? $api['strDescriptionEN'] : null,
            'date_of_signing'  =>isset($api['dateSigned'])       ? $api['dateSigned'] : null,
            'date_of_birth'    =>isset($api['dateBorn'])         ? $api['dateBorn'] : null,
            'birth_place'      =>isset($api['strBirthLocation']) ? $api['strBirthLocation'] : null,
            'position'         =>isset($api['strPosition'])      ? $api['strPosition'] : null,
            'nationality'      =>isset($api['strNationality'])   ? $api['strNationality'] : null,
            'height'           =>isset($api['strHeight'])        ? $api['strHeight'] : null,
            'weight'           =>isset($api['strWeight'])        ? $api['strWeight'] : null,
            'income'           =>isset($api['strWage'])          ? $api['strWage'] : null,
            'twitter'          =>isset($api['twitter'])          ? $api['twitter'] : null,
            'instagram'        =>isset($api['instagram'])        ? $api['instagram'] : null,
            'facebook'         =>isset($api['facebook'])         ? $api['facebook'] : null,
            'thumb_pic'        =>isset($api['strThumb'])         ? $api['strThumb'] : null,
            'profile_pic'      =>isset($api['strCutout'])        ? $api['strCutout'] : null
        ]);
        return $player;
    }


    public function countPlayer(){
        $totalplay = 0;
        $tournamentTeams = Team::all()->where("tournament_id", 1,1);
        for($i=1; $i<=count($tournamentTeams);$i++)
        {
            $teamdata = Player::where("team_id",$i)->get();
            $teamname = Team::select('name')->where("id",$i)->get();
            $teamplayer = $teamdata->count();
            $totalplay = $totalplay + $teamplayer;
        }
        return $totalplay;
    }
    public function show($id)
    {
        $data = Player::where('player_id',$id);
        return $data;
    }


    // Eloquent relation methods
    public function team()
    {
        return $this->belongsTo(Team::Class);
    }

    public function goal()
    {
        return $this->hasMany(Goal::Class);
    }

    public function card()
    {
        return $this->hasMany(Card::Class);
    }

    public function scoreBoard()
    {
        return $this->hasMany(ScoreBoard::Class);
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::Class);
    }

    public function standing()
    {
        return $this->hasMany(Standing::Class);
    }

    public function image()
    {
        return $this->hasMany(Image::Class);
    }

    public function notification()
    {
        return $this->belongsToMany(Notification::Class);
    }
}
