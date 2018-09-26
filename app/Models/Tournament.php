<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{

    protected $guarded = ['id'];

    public function fetchAll(){
        $tournament = self::all();
        return $tournament;
    }

    public function insert($result,$sport_id)
    {
        $tournament  = self::updateOrCreate([
            'api_id'         => isset($result['idLeague']) ? $result['idLeague'] : null
        ],[
            'name'           => isset($result['strLeague']) ? $result['strLeague'] : null,
            'logo'           => isset($result['strLogo']) ? $result['strLogo'] : null,
            'alternate_name' => isset($result['strLeagueAlternate']) ? $result['strLeagueAlternate'] : null,
            'establish_at'   => isset($result['intFormedYear']) ? $result['intFormedYear'] : null,
            'first_event'    => isset($result['dateFirstEvent']) ? $result['dateFirstEvent'] : null,
            'gender'         => isset($result['strGender']) ? $result['strGender'] : null,
            'country'        => isset($result['strCountry']) ? $result['strCountry'] : null,
            'website'        => isset($result['strWebsite']) ? $result['strWebsite'] : null,
            'description'    => isset($result['strDescriptionEN']) ? $result['strDescriptionEN'] : null,
            'sport_id'       => isset($sport_id) ? $sport_id : null
        ]);
        return $tournament;
    }


    public function show($id)
    {
        $tournament = self::findOrFail($id);
        return $tournament;
    }

    public function getTournamentId($tournamentName){
        $tournamentInfo = self::where('name', $tournamentName)->first();
        $tournament_id = $tournamentInfo['id'];
        return $tournament_id ;
    }

    // Eloquent relation methods
    public function sport()
    {
        return $this->belongsTo(Sport::Class);
    }

    public function team()
    {
        return $this->hasMany(Team::Class);
    }

    public function match()
    {
        return $this->hasMany(Match::Class);
    }

    public function image()
    {
        return $this->hasMany(Image::Class);
    }

    public function standing()
    {
        return $this->hasMany(Standing::Class);
    }

    public function notification()
    {
        return $this->belongsToMany(Notification::Class);
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::Class);
    }
    public function tournament()
    {
        return $this->hasMany(Season::Class);
    }
}
