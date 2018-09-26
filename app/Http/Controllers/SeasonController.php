<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Season as Season;

class SeasonController extends Controller
{
    private $season;
    public function __construct(Season $season)
    {
        $this->season = $season;
    }

    public function index()
    {
        //
    }


    public function create($tournament)
    {
        $result = fetchFromApi("https://www.thesportsdb.com/api/v1/json/1/search_all_seasons.php?id=$tournament->api_id");
        $season_count = count($result['seasons']);
        for ($i = 0; $i < $season_count; $i++){
            $season = $result['seasons'][$i]['strSeason'];
            $this->season->insert($season,$tournament);
        }

    }
}
