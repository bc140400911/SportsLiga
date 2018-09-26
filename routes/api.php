<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',"Api\RegisterController@register");
Route::post('login',"Api\LoginController@login");
Route::post('socialLogin',"Api\LoginController@socialLogin");
//
//Route::post('resetPassword/email',"Api\PassResetController@pass_reset");

Route::post('resetPassword','Api\PassResetController@pass_reset');


Route::get('email','Api\PassResetController@index');
// Tournament APi Routes
Route::get('tournaments','Api\TournamentController@fetchAll');
Route::get('tournament/{id}','Api\TournamentController@show');



//teams api routes
Route::get('allteams','Api\TeamController@fetchAllData');
Route::post('teams','Api\TeamController@fetchData');
Route::get('team/{id}','Api\TeamController@show');
Route::get('teamImg/{teamId}','Api\TeamController@teamImage');

// User Api Routes
Route::get('user/show/{id}','Api\UserController@show');

//Standing Api Routes
Route::get('standings','Api\StandingController@fetchAll');
Route::get('standing/{id}','Api\StandingController@show');
Route::get('teamStanding/{id}','Api\StandingController@teamStanding');
//Cards  Api Routes
Route::get('cards','Api\CardsController@fetchAll');


//Scoreboard api routes
Route::get('scoreboard','Api\ScoreboardController@fetchData');
Route::get('scoreboard/{id}','Api\ScoreboardController@show');



//Matche's Routes
Route::get('matches',       "Api\MatchController@index");
Route::get('matches/{id}',  "Api\MatchController@show");


//Player Api Routes
Route::get('playersbyteam/{id}','Api\PlayerController@fetch');
Route::get('player/show/{id}','Api\PlayerController@show');

//Season Api Routes
Route::get('seasons','Api\SeasonController@fetch');
Route::get('season/show/{id}','Api\SeasonController@show');

//Goal's Routes
Route::get('goals', 'Api\GoalController@index');
Route::get('teamGoals/{teamId}','Api\GoalController@show');
Route::get('topGoals','Api\GoalController@topGoals');
//comments
Route::get('matchComments/{id}', 'Api\CommentController@fetchMatchComments');
Route::post('comment/delete','Api\CommentController@destroy');
Route::post('comment/update','Api\CommentController@update');
Route::post('createComment','Api\CommentController@store');

//favorite api
Route::post('favorite','Api\FavoriteController@store');
Route::get('favorite/tournament/{tournamentId}/{userId}','Api\FavoriteController@findTournament');
Route::post('teams/{id}', 'Api\TeamController@favoriteTeams');
Route::get('tournaments/{id}', 'Api\TournamentController@favoriteTournament');
Route::get('playersbyteam/{team_id}/{user_id}', 'Api\PlayerController@favoritePlayer');
//notification Api
Route::post('notification', 'Api\NotificationController@userNotification');

//stadium Route
Route::get("stadium/{id}",'Api\StadiumController@show');
Route::get('live-score','Api\LiveScoreController@liveScore');