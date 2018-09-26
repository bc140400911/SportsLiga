<?php

namespace App\Models;

use App\Console\Commands\updateMatches;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

//    public function __construct()
//    {
//
//    }

    public function fetchAll(){
        $comment = self::all();
        return $comment;
    }

    public function create($validatedData)
    {
        if($validatedData["user_id"] == null || $validatedData["match_id"] == null || $validatedData["text"] == ""){
            $error = array("Error"=>"You have not send the required data.");
            return $error;
        }else{
        $comments  = self::updateOrCreate([
            'user_id'         => isset($validatedData['user_id']) ? $validatedData['user_id'] : null,
            'match_id'           => isset($validatedData['match_id']) ? $validatedData['match_id'] : null,
            'text'           => isset($validatedData['text']) ? $validatedData['text'] : null,
        ]);
        return $comments;
        }
    }

    public function comments()
    {
        $comments=self::orderBy('created_at', 'DESC')->get();
        return $comments;

    }
    public function getComments(){
        $allComments =self::all();
        return $allComments;
    }
    public function totalComments(){
        $totalcomments = Comment::count();
        return $totalcomments;
    }
    public function commentsUpdate($updateComment)
    {

        $result =  self::updateOrCreate(
            ['id' => $updateComment['comment_id']],
            ['text' => $updateComment['text']]
        );
        return $result;

    }

    public function trash($id)
    {
            $comment =self::find($id);
            if ($comment){
                $commentDeleted = $comment->delete();
//                $commentDeleted = array('delete'=>'deleted');
                return $commentDeleted;
            }else{

                $error = array("error"=>'Somthing went wrong possibly comment with id could not exist.');
            return $error;
            }
                }

    protected $guarded = ['id'];

    // Eloquent relation methods
   public function match(){
       return $this->belongsTo(Match::Class);
   }
   public function user(){
       return $this->belongsTo(User::Class);
   }
   public function news(){
       return $this->belongsTo(News::Class);
   }
}
