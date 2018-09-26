<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Player as Player;
use App\Models\Image as Image;
use App\Models\Favorite as Favorite;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $_player;
    private $_tournament;
    private $_playerImage;
    private $_favorite;
    public function __construct(Player $player,Image $image, Favorite $favorite)
    {
        $this->_player = $player;
        $this->_playerImage = $image;
        $this->_favorite = $favorite;
    }


    public function index()
    {

    }
//     public  function  playerImage($playerId){
//        $this->_player->where('player_id',$playerId)->where('type','jers')->get();
//     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    public function fetch($id)
    {
        $playerdata = array();
        $player = $this->_player->all()->where('team_id',$id);
        foreach ($player as $players){
            $player_data['favorite'] = 0;
            $player_data['id'] = $players->player_id;
            $player_data["team_id"] = $players->team_id;
            $player_data["name"] = $players->name;
            $player_data["Image"] = $players->thumb_pic;
            $player_data["team_name"] = $players->team_name;
            $player_data["position"] = $players->position;
            array_push($playerdata,$player_data);

        }

        return json_encode($playerdata);
    }

    public function favoritePlayer($team_id, $user_id){
        $playerdata = array();
        $player = $this->_player->all()->where('team_id',$team_id);
        foreach ($player as $players){
            $favorite = $this->_favorite::where('user_id', $user_id)->where('player_id', $players->player_id)->first();
            if(isset($favorite->id)){
                $player_data['favorite'] = 1;
            }
            else{
                $player_data['favorite'] = 0;
            }
            $player_data["id"]= $players->player_id;
            $player_data["team_id"] = $players->team_id;
            $player_data["name"] = $players->name;
            $player_data["date_of_signing"] = $players->date_of_signing;
            $player_data["date_of_birth"] = $players->date_of_birth;
            $player_data["height"] = $players->height;
            $player_data["weight"] = $players->weight;
            $player_data["income"] = $players->income;

            if($players->thumb_pic != NULL) {
                $player_data["Image"] = $players->thumb_pic;
            }
            else{
                $player_data["Image"] = "http://127.0.0.1:8000/assets/frontend/images/profilepic.jpg";
            }
            $player_data["team_name"] = $players->team_name;
            $player_data["position"] = $players->position;
            array_push($playerdata,$player_data);

        }
        return json_encode($playerdata);
    }
    public function show($id)
    {

        $player = $this->_player::where('player_id',$id)->get();
        return json_encode($player);
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
