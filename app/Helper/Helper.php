<?php
use App\Models\Team;
use App\Models\Match;
if (! function_exists('fetchFromApi')){
    function fetchFromApi($link)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $link);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($curl), true);
        curl_close($curl);
        return $result;
    }
}
// Helper method  for getting team ID
if(! function_exists('getTeamId')){
     function getTeamId($teamName)
     {
        $teamInfo = Team::where('name', $teamName)->first();
        $team_id = $teamInfo['id'];
        return $team_id ;
     }
}
// Helper method for getting  tournament ID
if(! function_exists('getTournamentId')){
     function getTournamentId($tournamentName)
     {
        $tournament = Team::where('name',$tournamentName)->first();
        $tournament_id =$tournament['id'];
        $tournament_id =$tournament['tournament_id'];
        return $tournament_id;
    }

}
// Helper method for check array index have image
if (! function_exists('isImages')){
    function isImages($link)
    {
        if (preg_match('/(\.jpg|\.png|\.bmp)$/i', $link)) {
            return true;
        }
        return false;
    }
}

// Helper method to check image type
if (! function_exists('imageType')){
    function imageType($link)
    {
        if (preg_match('/logo/i', $link)) {
            return "logo";
        }
        if (preg_match('/fanart/i', $link)) {
            return "fanart";
        }
        if (preg_match('/banner/i', $link)) {
            return "banner";
        }
        if (preg_match('/jersey/i', $link)) {
            return "jersey";
        }
        if (preg_match('/badge/i', $link)) {
            return "badge";
        }
        if (preg_match('/poster/i', $link)) {
            return "poster";
        }
        if (preg_match('/trophy/i', $link)) {
            return "trophy";
        }
        if (preg_match('/stadium/i', $link)) {
            return "stadium";
        }
        return false;
    }
}

// Helper method to save image in folders
if (! function_exists('saveImages')){
    function saveImages($url, $id, $about,$type)
    {

            $extantion  = pathinfo($url, PATHINFO_EXTENSION);
            $image_path = public_path()."/assets/frontend/images/".$about."/".$type."-".$id.".".$extantion;
            $image_path_db =  "/assets/frontend/images/".$about."/".$type."-".$id.".".$extantion;
            $image      = file_get_contents($url);
            $image_save = file_put_contents($image_path, $image);
            return $image_path_db;

    }
}

// Helper method  for getting team name
if(! function_exists('getTeamName')){
    function getTeamName($id)
    {
        $result = Team::where('id', $id)->first();
        return $result['name'];
    }
}