<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    private $player;
    private $tournament;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(player $players, Team $Team, Tournament $tournament)
    {
        $this->player = $players;
        $this->Team = $Team;
        $this->tournament = $tournament;
    }
    public function index()
    {
//        $this->create();
        $data = $this->player->show();
        return view('player.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function apiLink(){
        $this->teamsdata = fetchFromApi('https://www.thesportsdb.com/api/v1/json/1/lookup_all_teams.php?id=4335');
        $this->testvar = $this->teamsdata['teams'];
        $testlength = count($this->testvar);
//        dd($testlength);
        for($i=0; $i<$testlength; $i++){
            $team = $this->testvar[$i]['idTeam'];
            $links[]= "https://www.thesportsdb.com/api/v1/json/1/lookup_all_players.php?id=".$team;
        }
//        dd($links);
        return $links;
    }
    public function getTeamId($teamName){
        $teamInfo = $this->Team::where('name', $teamName)->first();
        $team_id = $teamInfo->id;
        return $team_id ;
    }
    public function create()
    {
        $link = $this->apiLink();
//        dd(count($link));
        for($j=0; $j<count($link); $j++){
            $this->result = fetchFromApi($link[$j]);
//            $tournament = $this->tournament->insert($this->league, $sport_id);
            for($i=0; $i<count($this->result['player']);$i++) {

                $this->playerinfo = $this->result['player'][$i];
                $teams_id = $this->getTeamId($this->playerinfo['strTeam']);
//                dd($teams_id);
                $this->player->create($this->result['player'][$i],$teams_id);
            }
        }

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
    public function show($tournamentId,$id)
    {
        $player=Player::where('player_id',$id)->first();
        $tournament = $this->tournament->show($tournamentId);
        return view('player.show', compact('player'),compact('tournament'));
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
