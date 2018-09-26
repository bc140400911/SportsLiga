<?php

namespace App\Http\Controllers;

use App\Models\Tournament as Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\SportController as SportController;
use App\Http\Controllers\SeasonController as Season;


class TournamentController extends Controller
{
    private $_tournament;
    private $_league;
    private $_sport;
    private $_image;
    private $_season;
    public function __construct(Tournament $tournament, SportController $sport, ImageController $image, Season $season)
    {
        $this->_tournament = $tournament;
        $this->_sport      = $sport;
        $this->_image     = $image;
        $this->_season     = $season;

    }

    public function index()
    {
        return view('tournament.frontend.index');
    }

    public function create()
    {
        // helper method for fetch data from api
        $result = fetchFromApi('https://www.thesportsdb.com/api/v1/json/1/lookupleague.php?id=4335');
        $this->_league = $result['leagues'][0];

        // send data to sport controller to save sport data
        $sport_id = $this->_sport->create($this->_league);

        // send sport id and datat to tournament controller to save tournament
        $tournament = $this->_tournament->insert($this->_league, $sport_id);

        // send data and tournament id to image controller to save tournament images
        $this->_image->create($this->_league,$tournament->id,'tournament');

        // send tournament to season controller to save tournament seasons
        $this->_season->create($tournament);
        return $tournament;

    }

    public function store(Request $request)
    {

    }

    public function fetchAll(){
        $tournament  = $this->_tournament->fetchAll();
        return $tournament;
    }

    public function show($id)
    {
        $tournament = $this->_tournament->show($id);
        return view('tournament.frontend.show', ['tournament' => $tournament]);
    }
}
