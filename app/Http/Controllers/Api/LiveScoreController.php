<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Team;

class LiveScoreController extends Controller
{
    public function liveScore()
    {
       $liveScore =  fetchFromApi('https://www.thesportsdb.com/api/v1/json/1/latestsoccer.php');

       sizeof($liveScore['teams']);
       //dd($matches);
       if(sizeof($liveScore['teams'])  > 0){
           $matches = $liveScore['teams']['Match'];
           foreach ($matches as $match){
               if($match['League'] == 'La Liga') {

                   $live['firstTeamName'] = $match['HomeTeam'];
                   $live['secondTeamName'] = $match['AwayTeam'];
                   $teamOneImages = Team::where('api_id',$match['HomeTeam_Id'])->get()->images;
                   foreach ($teamOneImages as $image){
                       if($image->type == 'badge'){
                           $live['firstTeamImage'] = $image->image;
                       }
                   }
                   $teamTowImages = Team::where('api_id',$match['AwayTeam_Id'])->get()->images;
                   foreach ($teamTowImages as $image){
                       if($image->type == 'badge'){
                           $live['secondTeamImage'] = $image->image;
                       }
                   }
                   $live['firstTeamGoals'] = $match['HomeGoals'];
                   $live['secondTeamGoals'] = $match['HomeGoals'];
                   $live['time'] = $match['Time'];
                   return response()->json($live, 200);
               }
               if (in_array("La Liga", $match))
               {
                   return response()->json('result not found',404);
               }
           }
       }else{
           return response()->json('result not found',404);
       }
       if (sizeof($matches) == 0){
           return response()->json('result not found',404);
       }

    }
}