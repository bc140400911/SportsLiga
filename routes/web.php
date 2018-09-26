<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Auth::routes();

    //user home page route
    Route::get('/', 'HomeController@index')->name('home')->middleware('guest');

    Route::group(['middleware' => 'guest'], function(){


        //API Routes
        Route::get('/matchApi', 'MatchController@api');

    //tournament page
        Route::resource('/tournament','TournamentController');

        // facebook social login route
        Route::get('login/{provider}','Auth\LoginController@redirectFacebook')->name('social.login');
        Route::get('login/{provider}/callback','Auth\LoginController@callbackFacebook');


    //admin route
        Route::get('/admin','HomeController@dashboard');

        Route::get('/admin-profile','HomeController@adminProfile')->name('admin-profile');
        Route::get('/admin-profile/update','HomeController@updateAdminInfo')->name('update-admin-info');


    //news route
        Route::get('tournament/{id}/news','NewsController@index')->name('news');
        Route::get('tournament/{id}/news-detail','NewsController@show')->name('news-detail');

 // comments route
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('/comments/{id}','CommentsController@store')->name('comments');
        Route::post('/update_comments/{id}','CommentsController@update')->name('update_comments');
        Route::get('/deleteComments/{id}', 'CommentsController@delete')->name('deleteComments');
        Route::get('showComments', 'CommentsController@index')->name('allcoments');


    //team route
        Route::get('tournament/{id}/teams','TeamController@index')->name('team');
        Route::get('tournament/{tournamentId}/team-info/{id}','TeamController@singleTeam')->name('team-info');

    //standing route
        Route::get('/tournament/{id}/standings/','StandingController@index')->name('standings');
        Route::get('/standings/{id}','StandingController@show')->name('standings-show');


    // Player Routes
        Route::get('players','PlayerController@index')->name('players');
        Route::get('{tournamentId}/player-info/{id}','PlayerController@show')->name('player-info');
//        Route::get('/count-player','PlayerController@countPlayer')->name('count-player');
    //scoreBoard Route
        Route::get('tournament/{id}/score-board','ScoreBoardController@index')->name('score-board');
        Route::get('tournament/{tournamentId}/score-filter/{id}','ScoreBoardController@filter')->name('score-filter');
        Route::get('tournament/{tournamentId}/score-info/{id}','ScoreBoardController@show')->name('score-info');
        Route::get('getTeamName/{id}','ScoreBoardController@getTeamName');

        //notification route
        Route::get('notification/{id}', 'NotificationController@show')->name('notification-show');

        //match route
        Route::get ('tournament/{id}/schedule','MatchController@index')->name('schedule');

        Route::get('tournament/{id}/live','LiveScoreController@show')->name('liveScore');
        Route::resource('/favorite','FavoriteController');

        Route::get('verify/{email}/{token}','Auth\RegisterController@verifyUserEmail');
        Route::post('profile/{id}/profile','UserController@show')->name('viewProfile');
        Route::post('/updateProfile/{id}','UserController@update')->name('updateProfile');
        Route::get('/updateDashboard/','HomeController@ajaxUpdate');

    });

    Route::group(['middleware' => ['ifAdmin','auth']] , function() {
        Route::get('/admin', 'HomeController@dashboard')->name('admin');
        Route::resource('/users-panel','UserController');
        Route::get('/teams-panel','TeamController@showOnDashboard')->name('teams-panel');
        Route::get('/admin-profile','HomeController@adminProfile')->name('admin-profile');
        Route::get('/show-comments','CommentsController@Comments')->name('show-comments');
        Route::get('/commentsDelete/{id}','CommentsController@delete')->name('commentsDelete');

    });
