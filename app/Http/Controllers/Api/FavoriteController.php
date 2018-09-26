<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Favorite as Favorite;
class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $_favorite;
    public function __construct(Favorite $favorite)
    {
       $this->_favorite = $favorite;
    }
    public function findTournament($tournamentId, $userId)
    {
//        $result = $this->_favorite->where('user_id', $tournamentId)->where('tournament_id', $userId);
        $result = $this->_favorite->findTournament($tournamentId, $userId);
//        $result1 = $this->_favorite->fetchAll();
        return json_encode($result);
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
        if($request->type == 'tournament') {
            $result = $this->_favorite->where('user_id', $request->user_id)->where('tournament_id', $request->id);
            if ($result->count() < 1) {
                $favorite = $this->_favorite->insert($request);
                return response()->json(['result' => 1]);
            }
            if($result->count() == 1){
                foreach ( $result->get() as $remove){
                    $id = $remove->id;
                }
                $remove = $this->destroy($id);
                return response()->json(['result' => 0]);
            }
        }
        if($request->type == 'player') {
            $result = $this->_favorite->where('user_id', $request->user_id)->where('player_id', $request->id);
            if ($result->count() < 1) {
                $favorite = $this->_favorite->insert($request);
                return response()->json(['result' => 1]);
            }
            if($result->count() == 1){
                foreach ( $result->get() as $remove){
                    $id = $remove->id;
                }
                $remove = $this->destroy($id);
                return response()->json(['result' => 0]);
            }
        }
        if($request->type == 'team') {
            $result = $this->_favorite->where('user_id', $request->user_id)->where('team_id', $request->id);
            if ($result->count() < 1) {
                $favorite = $this->_favorite->insert($request);
                return response()->json(['result' => 1]);
            }
            if($result->count() == 1){
                foreach ( $result->get() as $remove){
                    $id = $remove->id;
                }
                $remove = $this->destroy($id);
                return response()->json(['result' => 0]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
   //
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
        $favorite = $this->_favorite->remove($id);
        return 0;
    }
}
