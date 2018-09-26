<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Standing;
use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class standingController extends Controller
{
    private $standing;
    private $team;
    private $tournament;

    public  function __construct(Standing $standing,Team $team, Season $season, Tournament $tournament)
    {
        $this->standing =$standing;
        $this->team =$team;
        $this->season = $season;
        $this->tournament = $tournament;
    }

    public function index($id)
    {
        $season =$this->season->show($id);
        $tournament = $this->tournament->show($id);
        //dd($tournament);
        return view('standing.index',['season'=>$season, 'tournament' => $tournament]);
    }

    public function create()
    {
        $season = $this->season->getSeason();
        foreach ($season as $seasonDate) {
            $seasons =  $seasonDate->season;
            $data = fetchFromApi("https://www.thesportsdb.com/api/v1/json/1/lookuptable.php?l=4335&s=$seasons");
            if (isset($data)){
                foreach ($data['table'] as $stadings) {
                    $this->standing->create($stadings,$seasons);
                }
            }
        }
    }


    public function store(Request $request)
    {
        $standings =$this->standing->show();
        return view('standing.index',['standing'=>$standings]);
    }


    public function show($id)
    {
        $result = $this->standing->findSeasonStandings($id);
        return response()->json(['result'=> $result]);
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
