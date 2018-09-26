<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goal;
use App\Models\Player;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    private $goal;
    public function __construct(Goal $_goal)
    {
        $this->goal = $_goal;
    }

    public function index()
    {
        $goals = $this->goal->index();
        return response()->json(compact('goals'));
    }

    /**
     * Show the form for creating a new resource.= $this->>goal->
     *
     * @return \Illuminate\Http\Response
     */
    public function topGoals(){
        $topGoalers = array();
        $topGaols = $this->goal::select('player_name')
            ->groupBy('player_name')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(2)
            ->get();
        //dd($topGaols);
        foreach ($topGaols as $topPlayer){
            //dd(explode(' ',$topPlayer->player_name));
            $result = Player::where('name', 'like', '%'.trim($topPlayer->player_name.'%'))->first();
            $player['name'] = $result->name;
            $player['player_id'] = $result->player_id;
            $player['thumb_pic'] = $result->thumb_pic;
            array_push($topGoalers, $player);
            //return $player;
        }
        //dd($topGoalers);
        return response()->json($topGoalers,200);
    }



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
    public function show($teamId)
    {
        $teamGoals = $this->goal->show($teamId);
        return response()->json(compact('teamGoals'));
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
