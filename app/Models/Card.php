<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable =['id',
        'team_id',
        'match_id',
        'player_name',
        'card_type',
        'min'];
    public function create($teamId, $matchId, $player, $cardType, $min)
    {
        if($teamId != null && $matchId != null && $player != null) {
            $cards = self::updateOrCreate([
                'team_id'      =>isset($teamId)             ? $teamId : null,
                'match_id'     =>isset($matchId)            ? $matchId : null,
                'player_name'    =>isset($player)           ? $player : null,
                'card_type'    =>isset($cardType)           ? $cardType : null,
                'min'          =>isset($min)                ? $min : null
            ]);
            return $cards;
        }

    }
    protected $guarded = ['id'];

    // method use for Card api
    public function fetchAll(){

        $cards = self::all();
        dd($cards);
        return $cards;
    }

    // Eloquent relation methods


    public function team(){
        return  $this->belongsTo(Team::Class);
    }

    public function scoreBoard(){
        return $this->belongsTo(ScoreBoard::Class);
    }
    public function player(){
        return $this->belongsTo(Player::Class);
    }
}
