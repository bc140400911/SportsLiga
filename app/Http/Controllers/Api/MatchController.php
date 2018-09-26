<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Match;
use App\Models\Image as Image;
class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $match;
    private $_image;
    public  function __construct(Match $_match , Image $image)
    {
        $this->match = $_match;
        $this->_image = $image;
    }

    public function index()
    {

        $match_array = array();
        $matches = $this->match->show();
        foreach ($matches as $match){
            $single_match['id'] = $match->id;
            $single_match['api_id'] = $match->api_id;
            $single_match['team_one_image'] = $this->getImages($match->first_team);
            $single_match['team_two_image'] = $this->getImages($match->second_team);
            $single_match['first_team_name'] = $match->first_team_name;
            $single_match['second_team_name'] = $match->second_team_name;
            $single_match['date'] = $match->date;
            $single_match['start_time'] = $match->start_time;
            array_push($match_array,$single_match);
        }

        return json_encode($match_array);

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
    public function getImages($id)
    {
        $match = $this->_image->where("team_id",$id)->where("type", 'badge')->get();
        foreach ($match as $image){
            $image->image;
        }
        return $image->image;
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
       $matchesById = $this->match->getMatches($id);
       return response()->json(compact('matchesById'));
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
