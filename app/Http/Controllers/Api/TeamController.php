<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Team as Team;
use App\Models\Image;
use App\Models\Player;
use App\Models\Favorite as Favorite;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $_team;
    private $_img;
    private $_player;
    private $_favorite;
    public function __construct(Team $team, Image $image, Player $player , Favorite $favorite)
    {
        $this->_team = $team;
        $this->_img  = $image;
        $this->_player = $player;
        $this->_favorite = $favorite;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function teamImage($teamId){
        $images   = $this->_img::where('team_id', $teamId)->where('type','badge')->first();


            $badge = $images->image;
            return $badge;


    }

    public function fetchData(Request $request)
    {

        $team_array = array();
        $team     = $this->_team->fetchData($request);

        foreach ($team as $teamData)
        {
          $team_info['favorite'] = 0;
          $team_info['teamId'] = $teamData->id;
          $team_info['name'] = $teamData->name;
          $team_info['country'] = $teamData->country;
          $team_info['description']= $teamData->description;
          $team_info['image'] = $this->teamImage($teamData->id);
            array_push($team_array,$team_info);
        }
        //$teamData = array(['team'=>$team,'images'=>$images]);

        return response()->json($team_array);
    }
    public function fetchAllData()
    {


        $team_array = array();
        $team     = $this->_team->fetchAll();

        foreach ($team as $teamData)
        {
            $team_info['favorite'] = 0;
            $team_info['teamId'] = $teamData->id;
            $team_info['name'] = $teamData->name;
            $team_info['country'] = $teamData->country;
            $team_info['description']= $teamData->description;
            $team_info['image'] = $this->teamImage($teamData->id);
            array_push($team_array,$team_info);
        }
        //$teamData = array(['team'=>$team,'images'=>$images]);

        return response()->json($team_array);
    }

    public function favoriteTeams(Request $request, $id){


        $team_array = array();
        $team     = $this->_team->fetchAll($request);

        foreach ($team as $teamData)
        {
            $favorite = $this->_favorite::where('user_id', $id)->where('team_id', $teamData->id)->first();
            if(isset($favorite->id)){
                $team_info['favorite'] = 1;
            }
            else{
                $team_info['favorite'] = 0;
            }
            $team_info['teamId'] = $teamData->id;
            $team_info['name'] = $teamData->name;
            $team_info['country'] = $teamData->country;
            $team_info['description']= $teamData->description;
            $team_info['image'] = $this->teamImage($teamData->id);
            array_push($team_array,$team_info);
        }
        //$teamData = array(['team'=>$team,'images'=>$images]);
        return response()->json($team_array);
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
    public function show($id)
    {
        $team = $this->_team->teamInfo($id);
        return response()->json($team);
    }

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
