<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\ScoreBoard;
use App\Models\Stadium;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\Player;
class teamController extends Controller
{
    private $_team;
    private $_image;
    private $_tournament;
    private $_match;
    private $_scoreboard;
    public function __construct(Team $team, ImageController $image, Tournament $tournament, Match $match , ScoreBoard $scoreBoard)
    {
        $this->_team       = $team;
        $this->_image      = $image;
        $this->_tournament = $tournament;
        $this->_match      = $match;
        $this->_scoreboard = $scoreBoard;
    }

    //teams view index
    public function index($id)
    {
        $showTeams = $this->_team->show($id);
        $tournament = $this->_tournament->show($id);
        return view('team.frontend.index',['showTeams'=>$showTeams, 'tournament' => $tournament]);
    }

    //single team view
    public function singleTeam($tournamentId, $id)
    {
        $teamInfo = $this->_team->teamInfo($id);
        $match = $this->_match->getMatches($id);
        $score = $this->_scoreboard->teamScore($id);
        $tournament = $this->_tournament->show($tournamentId);
        return view('team.frontend.show',['teamInfo'=>$teamInfo,'match'=>$match, 'score'=>$score, 'tournament' => $tournament]);
    }

    //store data in db
    public function create()
    {
        $this->teamsdata = fetchFromApi('https://www.thesportsdb.com/api/v1/json/1/lookup_all_teams.php?id=4335');
        foreach ($this->teamsdata['teams'] as $teams) {
            $tournament_id = $this->_tournament->getTournamentId($teams['strLeague']);
            $team = $this->_team->create($teams, $tournament_id);
            $this->_image->create($teams,$team->id,'team');
        }
    }

    public function showOnDashboard(){
        $teams = $this->_team->fetchAll();
        return view('team.backend.show-teams',['teams'=>$teams]);
    }

}
