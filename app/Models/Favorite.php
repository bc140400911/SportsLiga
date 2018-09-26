<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Favorite extends Model
{
    use Notifiable;
    private $type;
    protected $guarded = ['id'];
    public function __construct()
    {

    }
    public function fetchAll(){
        $favorite = self::all();
        return $favorite;
    }
    public function findTournament($tournamentId, $userId){
        $favorite = self::where('user_id', $userId)->where('tournament_id', $tournamentId)->first();
        return $favorite;
    }
    public function insert($request)
    {
        if ($request->type == "tournament"){
            $this->tournament_id = $request->id;
        }
        if ($request->type == "team"){
            $this->team_id = $request->id;
        }
        if ($request->type == "player"){
            $this->player_id = $request->id;
        }

        $this->user_id = $request->user_id;
        $this->save();
        return $this->id;
    }

    public function remove($id)
    {
        $favorite = self::find($id);
        $favorite->delete();
        return $favorite;
    }
    public function getUserId($firstTeam , $secondTeam){
        $data = self::where('team_id',$firstTeam)->orwhere('team_id',$secondTeam)->first();
        $user_id = $data['user_id'];
        $user = User::where('id',$user_id)->first();
        return $user;
    }



    // Eloquent relation methods
    public function tournament(){
        return $this->belongsTo(Tournament::Class);
    }
      public function team(){
          return  $this->hasOne(Team::Class);
      }

      public function player(){
          return $this->hasOne(Player::Class);
      }
    public function user(){
        return $this->belongsTo(User::Class);
    }
}
