<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Standing as Standing;
use App\Models\Team;
use App\Models\Image;

class StandingController extends Controller
{
    private $_standing;
    private $_team;
    private $_Images;
    public function  __construct(Standing $standing,Team $team, Image $image)
    {
        $this->_standing = $standing;
        $this->_team = $team;
        $this->_Images = $image;
    }

//    public function teamImage($teamId){
//        $images   = $this->_Images::where('team_id', $teamId)->where('type','badge')->get();
//
//        foreach ($images as $image){
//
//            $Images = $image->image;
//            return $Images;
//        }
//
//    }
    public function teamImage($teamId){
        $images = $this->_Images->where("team_id",$teamId)->where('type','badge')->get();

        foreach ($images as $image){

            $Images = $image->image;
            return $Images;
        }

    }
    public function fetchAll(){

        $standing_array = array();

        $team_standing = $this->_standing->fetchAll();
        foreach ($team_standing as $standings){
            if($standings->season_id >= 11 ) {
                $standing['name'] = $standings->name;
                $standing['played'] = $standings->played;
                $standing['win'] = $standings->win;
                $standing['loss'] = $standings->loss;
                $standing['draw'] = $standings->draw;
                $standing['goalsfor'] = $standings->goalsfor;
                $standing['goalsagainst'] = $standings->goalsagainst;
                $standing['goalsdifference'] = $standings->goalsdifference;
                $standing['total'] = $standings->total;
                $standing['Image'] = $this->teamImage($standings->team_id);

                array_push($standing_array, $standing);
            }
        }
        return json_encode($standing_array);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $standingById = $this->_standing->standingById($id);
        return json_encode($standingById);

    }
   public function teamStanding($teamId){

        $teamStanding = $this->_standing->standingByTeam($teamId);
     return response()->json($teamStanding);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//
//        $tournament = $this->_standing->show($id);
//        return json_encode($tournament);
//
//
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
