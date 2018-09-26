<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Tournament;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $comment;
    private $_tournament;
      public function __construct(Comment $comment, Tournament $tournament)
      {

          $this->_tournament = $tournament;
          $this->comment = $comment;
      }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
//        dd($id);
        $tournament = $this->_tournament->show($id);
        return view('news.index' ,['tournament'=>$tournament]);
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
        $tournament = $this->_tournament->show($id);
        $comments = $this->comment->getComments();
        return view('news.show',['comments'=>$comments,'tournament'=>$tournament]);
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
