<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ImageController;
use App\Models\Tournament;

class Team extends Model
{
    protected $table = 'teams';
    protected $guarded = ['id'];
    // Eloquent relation methods
    public function tournament()
    {
        return $this->belongsTo(Tournament::Class);
    }

    public function player()
    {
        return $this->hasMany(Player::Class);
    }

    public function match()
    {
        return $this->hasMany(Match::Class);
    }

    public function standing()
    {
        return $this->hasMany(Standing::Class);
    }

    public function image()
    {
        return $this->hasMany(Image::Class);
    }

    public function scoreBoard()
    {
        return $this->hasMany(ScoreBoard::Class);
    }

    public function inning()
    {
        return $this->hasMany(Inning::Class);
    }

    public function goal()
    {
        return $this->hasMany(Goal::Class);
    }

    public function card()
    {
        return $this->hasMany(Card::Class);
    }

    public function notification()
    {
        return $this->belongsToMany(Notification::Class);
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::Class);
    }
    public function stadium(){
        return $this->hasOne(Stadium::class);
    }


    public function create($teams,$tournament_id)
    {
            $team = self::updateOrCreate([
                'tournament_id' => isset($tournament_id) ? $tournament_id : null,
                'api_id'        => isset($teams['idTeam']) ? $teams['idTeam']: null,
                'name'          => isset($teams['strTeam']) ? $teams['strTeam']: null,
                'description'   => isset($teams['strDescriptionEN']) ? $teams['strDescriptionEN']: null,
                'country'       => isset($teams['strCountry']) ? $teams['strCountry']: null,
                'gender'        => isset($teams['strGender']) ? $teams['strGender']: null,
                'short_name'    => isset($teams['strTeamShort']) ? $teams['strTeamShort']: null,
                'manager'       => isset($teams['strManager']) ? $teams['strManager']: null,
                'establish_at'  => isset($teams['intFormedYear']) ? $teams['intFormedYear']: null,
            ]);
            return $team;
    }

//$page = $request->page ?: 0; / Actual page /
//$limit = 10; / Limit per page /$user = User::find($request->user_id);
//$userNotifications = $user->notifications()->offset($page * $limit)->limit($limit)->get();


//    public function fetchData($request){
//        $page = $request->page ?: 0;
//        $limit = 10;
//        $tournament = Tournament::find($request->tournament_id);
//
//
//        $teams = $tournament->team()->offset($page * $limit)->limit($limit)->get();
////        $teams = self::paginate(10);
//       // dd($teams);
//        return $teams;
//    }
//    public function fetchAll($request){
//        $page = $request->page ?: 0;
//        $limit = 10;
//        $tournament = Tournament::find($request->tournament_id);
//
//
//        $teams = $tournament->team()->offset($page * $limit)->limit($limit)->get();
////        $teams = self::all();
////        dd($teams);
//        return $teams;
//    }

    public function fetchData($request){
//        $page = $request->page ?: 0;
//        $limit = 10;
        $tournament = Tournament::find($request->tournament_id);
//
//
        $teams = $tournament->team()->get();
//        $teams = self::all();

        // dd($teams);

       // dd($teams);

        return $teams;
    }
    public function fetchAll(){
//        $tournament = Tournament::find($request->tournament_id);


//        $teams = $tournament->team()->get();
        $teams = self::all();
//        dd($teams);
        return $teams;
    }
    public function show($id)
    {
        return self::where('tournament_id',$id)->get();
    }

    public function teamInfo($id){

        return  self::find($id);

    }

}
