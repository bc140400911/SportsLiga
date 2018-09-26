<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment =$comment;
    }


    public function store($id ,Request $request )
    {


        $validatedData =$request->validate([
            'text' => 'required',
            'user_id' => 'required',
            'match_id' => 'required',
]);
        $result = $this->comment->create($validatedData);

        return $result;
//        return view('news.show',['comments'=>$result]);

    }
    public function showComments(){
        $comments = $this->comment->getComments();
        return view('scoreBoard.index',['comments'=>$comments]);

    }

    public function index()
    {
        $allcoments = $this->comment::all();
//        dd($allcoments);
        return  $allcoments;
    }
    public function Comments(){

       $comments = $this->comment->getComments();
        return view('comments.show',['comments'=>$comments]);
    }


    public function show()

    {
//                $comments =Comment::update()->where'');




    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
       $comments =$request->all();
              $result = $this->comment->commentsUpdate($comments);
                 return response()->json($result);
    }

    public function delete($id)
    {
        $comment = $this->comment->trash($id);
        return response()->json($comment);
    }
}
