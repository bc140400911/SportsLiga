<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tournament as Tournament;
use App\Models\Favorite as Favorite;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $_tournament;
    private $_favorite;
    public function __construct(Tournament $tournament , Favorite $favorite)
    {
        $this->_tournament = $tournament;
        $this->_favorite = $favorite;
    }

    public function fetchAll(){
        $tournament_array = array();
        $tournaments = $this->_tournament->fetchAll();
        foreach ($tournaments as $tournament){
            $tournament_single['favorite'] = 0;
            $tournament_single['id'] = $tournament->id;
            $tournament_single['name'] = $tournament->name;
            $tournament_single['country'] = $tournament->country;
            foreach ($tournament->image as $images){
                if ($images->type == "badge"){
                    $tournament_single['badge'] = $images->image;
                }

            }
            array_push($tournament_array,$tournament_single);
        }
        return json_encode($tournament_array);
    }

    public function favoriteTournament($id){
        $tournament_array = array();
        $tournaments = $this->_tournament->fetchAll();
        foreach ($tournaments as $tournament){
            $favorite = $this->_favorite::where('user_id', $id)->where('tournament_id', $tournament->id)->first();
            if(isset($favorite->id)){
                $tournament_single['favorite'] = 1;
            }
            else{
                $tournament_single['favorite'] = 0;
            }
            $tournament_single['id'] = $tournament->id;
            $tournament_single['name'] = $tournament->name;
            $tournament_single['country'] = $tournament->country;
            foreach ($tournament->image as $images){
                if ($images->type == "badge"){
                    $tournament_single['badge'] = $images->image;
                }

            }
            array_push($tournament_array,$tournament_single);
        }
        return json_encode($tournament_array);
    }

    public function show($id)
    {
        $tournament = $this->_tournament->show($id);
        return json_encode($tournament);
    }
}
