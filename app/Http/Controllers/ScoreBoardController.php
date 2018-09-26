<?php

namespace App\Http\Controllers;


use App\Models\Comment;

use App\Models\Favorite;

use App\Models\Tournament;
use \Illuminate\Notifications\Notifiable;
use App\Notifications\FavoriteNotifications;
//use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Match;
use App\Models\Stadium;
use App\Models\Player;
use App\Models\Card;
use App\Models\Goal;
use App\Models\Season;
use App\Models\ScoreBoard;
use App\Models\User as user;

class ScoreBoardController extends Controller
{
    use Notifiable;
    private $event;
    private $tournament;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct(Team $Team, ScoreBoard $scoreboard, Match $match, Stadium $stadium, Player $Player, Card $Card, Goal $Goal,Tournament $tournament,Favorite $favorite,Comment $comment, Season $season)

    {
        $this->Player = $Player;
        $this->Card = $Card;
        $this->Goal = $Goal;
        $this->stadium = $stadium;
        $this->match = $match;
        $this->scoreboard = $scoreboard;
        $this->Team = $Team;
        $this->tournament = $tournament;
        $this->comment = $comment;
        $this->season = $season;
        $this->favorite = $favorite;

    }


//    public function index($id)
//    {
//        $score = $this->scoreboard->showScore();
//        $match = $this->scoreboard->showMatch();
//        $team = $this->scoreboard->showTeam();
////        return view('scoreBoard.index', ['score' => $score, 'match' => $match, 'team' => $team]);
//        $tournament = $this->tournament->show($id);
////        $this->create();
//        $comments = $this->comment->getComments();
//        $season = $this->season->show($id);
//        return view('scoreBoard.index', ['score' => $score, 'season' => $season, 'match' => $match, 'teams' => $team, 'tournament' => $tournament, 'comments' => $comments]);
//
//    }
//

    public function seasonLink()
    {
        $this->seasondata = fetchFromApi('https://www.thesportsdb.com/api/v1/json/1/search_all_seasons.php?id=4335');
        $this->Seasons = $this->seasondata['seasons'];
        $countSeason = count($this->Seasons);
//dd($this->Seasons);
        for($k=10; $k<$countSeason; $k++){
            $season = $this->Seasons[$k]['strSeason'];
            $seasonLinks[] = "https://www.thesportsdb.com/api/v1/json/1/eventsseason.php?id=4335&s=".$season;
        }
//        dd($seasonLinks);
        return $seasonLinks;
    }

    public function apiLink()
    {
        $seasnlink = $this->seasonLink();
//dd($seasnlink);
        for($m=0; $m < count($seasnlink); $m++){
            $this->scoredata = fetchFromApi($seasnlink[$m]);
            $this->testvar = $this->scoredata['events'];
            $testlength = count($this->testvar);
//        dd($testlength);
            for($i=0; $i<$testlength; $i++){
                $score = $this->testvar[$i]['idEvent'];
                $links[]= "https://www.thesportsdb.com/api/v1/json/1/lookupevent.php?id=".$score;

            }
//            $all[] = $links[$m];
//        dd($links);
//            return $links;
        }
//dd($links);
return $links;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTeamId($teamName)
    {
        $teamInfo = $this->Team::where('name', $teamName)->first();
        if($teamInfo != null) {
            $team_id = $teamInfo->id;
            return $team_id;
        }

    }

    public function getMatchId($teamOneName, $teamTwoName, $matchSeason)
    {
        $team_one_id = $this->getTeamId($teamOneName);
        $team_two_id = $this->getTeamId($teamTwoName);
//dd($matchSeason);
        $matchInfo = $this->match::where('first_team', $team_one_id)->where('second_team', $team_two_id)->where('season', $matchSeason)->first();
        if($matchInfo){
            $match_id = $matchInfo->id;
//        dd($match_id);
            return $match_id;
        }

    }

    public function matchResult($team_one_score, $team_two_score, $team_one_name, $team_two_name)
    {
        if ($team_one_score > $team_two_score) {
            $result = $team_one_name . " Win.";
            return $result;
        } elseif ($team_one_score == $team_two_score) {
            $result = "Tie.";
            return $result;
        } else {
            $result = $team_two_name . " Win.";
            return $result;
        }
    }


    public function createScore()
    {
        $link = $this->apiLink();
//        dd($link);
        for ($j = 0; $j < count($link); $j++) {
            $this->result = fetchFromApi($link[$j]);
//            dd($this->result);
            for ($i = 0; $i < count($this->result['events']); $i++) {
                $this->eventinfo = $this->result['events'][$i];
                $match_id = $this->getMatchId($this->eventinfo['strHomeTeam'], $this->eventinfo['strAwayTeam'], $this->eventinfo['strSeason']);
                $team_one_id = $this->getTeamId($this->eventinfo['strHomeTeam']);
                $team_two_id = $this->getTeamId($this->eventinfo['strAwayTeam']);
                $season = $this->eventinfo['strSeason'];
                $event = $this->eventinfo['idEvent'];
                $match_result = $this->matchResult($this->eventinfo['intHomeScore'], $this->eventinfo['intAwayScore'], $this->eventinfo['strHomeTeam'], $this->eventinfo['strAwayTeam']);
                $scoreboard = $this->scoreboard->create($this->eventinfo, $event, $team_one_id, $team_two_id, $match_id, $season, $match_result);
                $scoreboard_array = array();
                //$scoreboard_array['api'] = $this->eventinfo;
                $scoreboard_array['api_id'] = $event;
                $scoreboard_array['team_one'] = $team_one_id;
                $scoreboard_array['team_one_name'] = $this->eventinfo['strHomeTeam'];
                $scoreboard_array['team_two'] = $team_two_id;
                $scoreboard_array['team_two_name'] = $this->eventinfo['strAwayTeam'];
                $scoreboard_array['match_id'] = $match_id;
                $scoreboard_array['team_one_score'] = $this->eventinfo['intHomeScore'];
                $scoreboard_array['team_two_score'] = $this->eventinfo['intAwayScore'];
                $scoreboard_array['season'] = $season;
                $scoreboard_array['result'] = $match_result;
                //$scoreboard_array['scoreboard'] = $scoreboard;

                if($this->favorite->getUserId($team_two_id,$team_one_id) != null){
                    $this->favorite->getUserId($team_two_id,$team_one_id)->notify(new FavoriteNotifications($scoreboard_array));
                }
            }

        }
    }

    public function createCards()
    {
        $link = $this->apiLink();
        for ($j = 0; $j < count($link); $j++) {
            $this->result = fetchFromApi($link[$j]);
            for ($i = 0; $i < count($this->result['events']); $i++) {
                $this->eventinfo = $this->result['events'][$i];
                $cardsArray = [
                    '0' => $this->eventinfo['strHomeRedCards'],
                    '1' => $this->eventinfo['strHomeYellowCards'],
                    '2' => $this->eventinfo['strAwayRedCards'],
                    '3' => $this->eventinfo['strAwayYellowCards']
                ];
                if ($cardsArray[0] != "&nbsp") {
                    $team_id = $this->getTeamId($this->eventinfo['strHomeTeam']);
                    $match_id = $this->getMatchId($this->eventinfo['strHomeTeam'], $this->eventinfo['strAwayTeam']);
                    $card_type = "red";
                    $array_player_min = explode(';', $this->eventinfo['strHomeRedCards']);
                    for ($k = 0; $k < count($array_player_min) - 1; $k++) {
                        $array_player = explode(':', $array_player_min[$k]);
                        $card_min = $array_player[0];
                        $card_player = $array_player[1];
                        if ($card_player == "&nbsp") {
                            $k = $k + 1;
                        } else {
                            $card_player_name = explode(' ', $card_player);
                            if(count($card_player_name)==3)
                            {
                                $playerName = $card_player_name[1]." ".$card_player_name[2];
                            }elseif(count($card_player_name)==2)
                            {
                                $playerName = $card_player_name[0]." ".$card_player_name[1];
//                                dd($playerName);
                            }else
                            {
                                $playerName = $card_player_name[0];
                            }

                            $this->Card->create($team_id, $match_id, $playerName, $card_type, $card_min);
                        }
                        $this->Card->create($team_id, $match_id, $playerName, $card_type, $card_min);
                    }
                }
                if ($cardsArray[1] != "&nbsp") {
                    $team_id = $this->getTeamId($this->eventinfo['strHomeTeam']);
                    $match_id = $this->getMatchId($this->eventinfo['strHomeTeam'], $this->eventinfo['strAwayTeam']);
                    $card_type = "yellow";
                    $array_player_min = explode(';', $this->eventinfo['strHomeYellowCards']);
                    for ($k = 0; $k < count($array_player_min) - 1; $k++) {
                        $array_player = explode(':', $array_player_min[$k]);
                        $card_min = $array_player[0];
                        $card_player = $array_player[1];
                        if ($card_player == "&nbsp") {
                            $k = $k + 1;
                        } else {
                            $card_player_name = explode(' ', $card_player);
                            if(count($card_player_name)==3)
                            {
                                $playerName = $card_player_name[1]." ".$card_player_name[2];
                            }elseif(count($card_player_name)==2)
                            {
                                $playerName = $card_player_name[0]." ".$card_player_name[1];
//                                dd($playerName);
                            }else
                            {
                                $playerName = $card_player_name[0];
                            }

                            $this->Card->create($team_id, $match_id, $playerName, $card_type, $card_min);
                        }
                        $this->Card->create($team_id, $match_id, $playerName, $card_type, $card_min);
                    }
                }
                if ($cardsArray[2] != "&nbsp") {
                    $team_id = $this->getTeamId($this->eventinfo['strAwayTeam']);
                    $match_id = $this->getMatchId($this->eventinfo['strHomeTeam'], $this->eventinfo['strAwayTeam']);
                    $card_type = "red";
                    $array_player_min = explode(';', $this->eventinfo['strAwayRedCards']);
                    for ($k = 0; $k < count($array_player_min) - 1; $k++) {
                        $array_player = explode(':', $array_player_min[$k]);
                        $card_min = $array_player[0];
                        $card_player = $array_player[1];
                        if ($card_player == "&nbsp") {
                            $k = $k + 1;
                        } else {
                            $card_player_name = explode(' ', $card_player);
                            if(count($card_player_name)==3)
                            {
                                $playerName = $card_player_name[1]." ".$card_player_name[2];
                            }elseif(count($card_player_name)==2)
                            {
                                $playerName = $card_player_name[0]." ".$card_player_name[1];
//                                dd($playerName);
                            }else
                            {
                                $playerName = $card_player_name[0];
                            }
                            $this->Card->create($team_id, $match_id, $playerName, $card_type, $card_min);
                        }
                    }
                }
                if ($cardsArray[3] != "&nbsp") {
                    $team_id = $this->getTeamId($this->eventinfo['strAwayTeam']);
                    $match_id = $this->getMatchId($this->eventinfo['strHomeTeam'], $this->eventinfo['strAwayTeam']);
                    $card_type = "yellow";
                    $array_player_min = explode(';', $this->eventinfo['strAwayYellowCards']);
                    for ($k = 0; $k < count($array_player_min) - 1; $k++) {
                        $array_player = explode(':', $array_player_min[$k]);
                        $card_min = $array_player[0];
                        $card_player = $array_player[1];
                        if ($card_player == "&nbsp") {
                            $k = $k + 1;
                        } else {
                            $card_player_name = explode(' ', $card_player);
//                            dd($card_player_name);
                            if(count($card_player_name)==3)
                            {
                                $playerName = $card_player_name[1]." ".$card_player_name[2];
                            }elseif(count($card_player_name)==2)
                            {
                                $playerName = $card_player_name[0]." ".$card_player_name[1];
//                                dd($playerName);
                            }else
                            {
                                $playerName = $card_player_name[0];
                            }
                            $this->Card->create($team_id, $match_id, $playerName, $card_type, $card_min);
                        }
//                        dd($card_player_name[1]);
//                        $card_player_info = $this->Player::where('name', 'LIKE', '%'.$card_player_name[2].'%')->first();
//                        $card_player_id = $card_player_info->id;
                        $this->Card->create($team_id, $match_id, $playerName, $card_type, $card_min);
                    }
                }
            }
        }
    }

    public function createGoal()
    {
        $link = $this->apiLink();
        for ($j = 0; $j < count($link); $j++) {
            $this->result = fetchFromApi($link[$j]);
            for ($i = 0; $i < count($this->result['events']); $i++) {
                $this->eventinfo = $this->result['events'][$i];
                $goalsArray = [
                    '0' => $this->eventinfo['strHomeGoalDetails'],
                    '1' => $this->eventinfo['strAwayGoalDetails']
                ];
//                dd($goalsArray);
                $match_id = $this->getMatchId($this->eventinfo['strHomeTeam'], $this->eventinfo['strAwayTeam']);
//                dd($match_id);
                if($goalsArray[0] != "")
                {
                    $team_id = $this->getTeamId($this->eventinfo['strHomeTeam']);
                    $array_min_player = explode(';', $this->eventinfo['strHomeGoalDetails']);
//                    dd($array_min_player);
                    for ($k = 0; $k < count($array_min_player) - 1; $k++)
                    {
                        $array_player = explode(':', $array_min_player[$k]);
                        $goal_min = $array_player[0];
                        $goal_player = $array_player[1];
                        $this->Goal->create($team_id, $match_id, $goal_player, $goal_min);
//                        dd($goal_player);
                    }

                }
                if($goalsArray[1] != "")
                {
                    $team_id = $this->getTeamId($this->eventinfo['strAwayTeam']);
                    $array_min_player = explode(';', $this->eventinfo['strAwayGoalDetails']);
//                    dd($array_min_player);
                    for ($k = 0; $k < count($array_min_player) - 1; $k++)
                    {
                        $array_player = explode(':', $array_min_player[$k]);
                        $goal_min = $array_player[0];
                        $goal_player = $array_player[1];
                        $this->Goal->create($team_id, $match_id, $goal_player, $goal_min);
//                        dd($goal_player);
                    }

                }
            }
        }
    }

    public function store(Request $request)
    {
        //
    }

    public function show($tournamentId,$id)
    {
        //dd($tournamentId);
        $scoreboard = ScoreBoard::find($id);
        $scoreMatchId = $scoreboard->match_id;
        $matchInfo = $this->match::where('id', $scoreMatchId)->first();
        $homeTeam = $matchInfo->first_team;
        $stadiumInfo = $this->stadium::where('team_id', $homeTeam)->first();
        $Cards = $this->Card::where('match_id', $scoreMatchId)->get();
        $homeCard = $this->Card::where('team_id', $scoreboard->team_one)->where('match_id', $scoreMatchId)->get();
        $awayCard = $this->Card::where('team_id', $scoreboard->team_two)->where('match_id', $scoreMatchId)->get();
        $Goals = $this->Goal::where('match_id', $scoreMatchId)->get();
        $homeGoal = $this->Goal::where('team_id', $scoreboard->team_one)->where('match_id', $scoreMatchId)->get();
        $awayGoal = $this->Goal::where('team_id', $scoreboard->team_two)->where('match_id', $scoreMatchId)->get();
        $tournament = $this->tournament->show($tournamentId);
        return view('scoreBoard.show', compact('scoreboard','matchInfo', 'stadiumInfo', 'Cards', 'homeCard', 'awayCard', 'Goals', 'homeGoal', 'awayGoal','tournament'));
//        $result = $this->scoreboard->findTeamScore($id);
//        return response()->json(['result'=> $result, 'tournamentId'=> $tournamentId]);
    }


    public function index($id)
    {

        $score = $this->scoreboard->showScore();
        $match = $this->scoreboard->showMatch();
        $team = $this->scoreboard->showTeam();
//        return view('scoreBoard.index', ['score' => $score, 'match' => $match, 'team' => $team]);
        $tournament = $this->tournament->show($id);
//        $this->create();
        $comments = $this->comment->getComments();

        return view('scoreBoard.index', ['score' => $score, 'match' => $match, 'team' => $team, 'tournament' => $tournament,'comments'=>$comments]);

//
    }
    public function filter($tournamentId,$id)
    {

        $match = $this->scoreboard->findMatch($id);
        $result = $this->scoreboard->findTeamScore($id);
        $array = array($match,$result);
        return response()->json(['array'=> $array]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getTeamName($id)
    {
        $team = $this->Team::where('id', $id)->first();
        $teamName = $team->name;
        return response()->json(['teamName'=> $teamName]);
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
