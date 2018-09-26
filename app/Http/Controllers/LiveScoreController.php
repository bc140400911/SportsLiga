<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class LiveScoreController extends Controller
{
    private $_tournament;

    public function __construct(Tournament $tournament)
    {
        $this->_tournament = $tournament;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $score = fetchFromApi('https://www.thesportsdb.com/api/v1/json/1/latestsoccer.php');
        $livescore = $score['teams'];

            $youtube = fetchFromApi("https://www.googleapis.com/youtube/v3/search?part=snippet&order=date&q=laliga%20league&maxResults=1&key=AIzaSyCxVuPAzJcnJPgSF50JojR1sDLRdupIc6M");
            $tournament = $this->_tournament->show($id);
            return view('liveScore.show',['youtube'=>$youtube,'livescores'=>$livescore,'tournament' => $tournament]);




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
