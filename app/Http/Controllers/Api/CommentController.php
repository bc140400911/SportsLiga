<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment as Comment;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $_comment;

    public function __construct(Comment $comment)
    {
        $this->_comment = $comment;
    }


    public function index()
    {
        //
    }

    public function fetchMatchComments($matchId)
    {
        $comments = $this->_comment->all()->where("match_id", $matchId);
        $commentArray = array();
        foreach ($comments as $comment){
            $match_comments["commentId"] = $comment->id;
            $match_comments["userId"]    = $comment->user_id;
            $match_comments["userImg"]  = $comment->user->image["image"];
            $match_comments["userName"] = $comment->user->first_name ." ". $comment->user->last_name;
            $match_comments["comment"] = $comment->text;
            array_push($commentArray,$match_comments);
        }
        return response()->json($commentArray);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
       $user_id      = $request["userId"];
       $match_id     = $request["matchId"];
       $comment      = $request["comments"];
       $commentArray = array("user_id"=>$user_id,"match_id"=>$match_id,"text"=>$comment);
       $com          = $this->_comment->create($commentArray);
       $usrID = $com->user_id;
           $response = array("user"=>$usrID);
       return response()->json($response);

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
    public function update(Request $request)
    {
        $commentId = $request["commentId"];
        $updatedComment = $request["updatedComment"];
        $comment = $this->_comment->where('id',$commentId)->update(['text'=> $updatedComment]);
        if ($comment){
            $updated = array("update"=> "updated");
            return response()->json($updated);
        }else{
            $error = array("error"=>"Error updating Somthing went wrong");
            return response()->json($error);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $commentId = $request["commentId"];
        $comment = $this->_comment->trash($commentId);
        return response()->json($comment);
    }
}
