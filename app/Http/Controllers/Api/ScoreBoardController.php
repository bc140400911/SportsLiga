<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ScoreBoard as ScoreBoard;
class ScoreBoardController extends Controller
{
    public function __construct(ScoreBoard $scoreBoard)
    {
        $this->_scoreboard = $scoreBoard;
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
    public function fetchData()
    {
        $scoreboard = $this->_scoreboard->showScore();
        return json_decode($scoreboard);
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
        $match = array();
        $scoreboard = $this->_scoreboard->findMatch($id);
        $match_info["firstTeamScore"] = $scoreboard["team_one_score"];
        $match_info["secondTeamScore"] = $scoreboard["team_two_score"];
        $match_info["matchResult"] = $scoreboard["result"];
        $match_info["manofTheMatch"] = $scoreboard["man_of_the_match"];
        $match_info["manofTheMatchScore"] = $scoreboard["man_of_the_match_score"];
        array_push($match,$match_info);
        return response()->json($match);
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
