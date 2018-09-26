<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Player;
use App\Models\Sport;
use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Models\Stadium;
use App\Models\User;
class HomeController extends Controller
{

    private $tournament;

    private $_tournament;
    private $_sport;
    private $_user;
    private $_player;
    private $_stadium;
    private $_team;
    private $_comment;
    private $_tournament_c;
    public function __construct(player $players,Tournament $tournament, stadium $stadium,User $user, Team $team, Comment $comment, Sport $sport, TournamentController $tournament_c)
    {
        $this->_player     = $players;
        $this->_sport      = $sport;
        $this->_stadium    = $stadium;
        $this->_user       = $user;
        $this->_tournament = $tournament;
        $this->_team       = $team;
        $this->_comment    = $comment;
        $this->_tournament_c = $tournament_c;

        $this->middleware('guest', [ 'except' => 'logout' ]);

    }
    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.frontend.index');
    }
    public function ajaxUpdate(){
        $totalPlayer   = $this->_player->countPlayer();
        $totalstadiums = $this->_stadium->totalStadium();
        $totalUsers    = $this->_user->toatalUserCount();
        $totalComments = $this->_comment->totalComments();
        $totalTeams    = $this->_team->count();
        $totalSports   = $this->_sport->count();
        $total = array(
            'totalplayer'   =>$totalPlayer,
            'totalstadium'  => $totalstadiums,
            'totaluser'     => $totalUsers,
            'totalComments' =>$totalComments,
            'totalsports'   =>$totalSports,
            'totalteams'    => $totalTeams
        );

return response()->json(compact('total'));

    }
    public function dashboard(Request $request){




        $players    = $this->_player->fetchAll();
        $users      = $this->_user->fetchAll();
        $tournament = $this->_tournament->fetchAll();
        $stadium    = $this->_stadium->fetchAll();
        $team       = $this->_team->fetchAll();
        $comment    = $this->_comment->fetchAll();
        $sport = $this->_sport->fetchAll();
        //$favorite_tournament = $this->_tournament_c->mostFavorite();
        $data = [
            'players' => $players,
            'users' => $users,
            'tournaments' => $tournament,
            'teams' => $team,
            'comments'  => $comment,
            'sports' => $sport,
            'stadium' => $stadium
        ];

        if($request->ajax()){
            return response()->json(['html' => view('home.backend.dashboard', $data)->render()]);
        }

        return view('home.backend.dashboard',['players'=>$players, 'users'=>$users, 'tournaments'=> $tournament, 'teams'=>$team, 'comments' => $comment,'sports' => $sport,'stadium' => $stadium]);
    }
    public function contactUs(){
        return view('home.frontend.contactUs');
    }
    public function aboutUs(){
        return view('home.frontend.aboutUs');
    }
    public function adminProfile(){
        $admins = $this->_user->fetchAll()->where('role',0,1);
        return view('layouts.adminProfile',['admins'=>$admins]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateAdminInfo()
    {
        redirect(route('admin-profile'));
    }
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response

     * @return void

     */
//    public function __construct(
    //    public function __construct();
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


}
