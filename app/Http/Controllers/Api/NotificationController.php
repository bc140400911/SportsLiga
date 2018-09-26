<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\Match;

class NotificationController extends Controller
{
    public function userNotification(Request $request){
        //$notifications = Notification::all();
        $page = $request->page ?: 0; /* Actual page */
        $limit = 10; /* Limit per page */
        $user = User::find($request->user_id);
        $userNotifications = $user->notifications()->offset($page * $limit)->limit($limit)->get();
        
        $notifications = array();
        $single_notification = array();
       // dd($user);
        foreach ($userNotifications as $notification) {

            $notification_data = $notification->data;
            //dd($notification_data);
            $single_notification["match_id"] = $notification_data["scoreBoard"]["match_id"];
            $single_notification["first_team_name"] = $notification_data["scoreBoard"]["team_one_name"];
            $single_notification["second_team_name"] = $notification_data["scoreBoard"]["team_two_name"];
            $single_notification["result"] = $notification_data["scoreBoard"]["result"];
            //$match = Match::find($single_notification["match_id"]);
            //dd($match);
//            $tournament = Tournament::find($match->tournament_id);
//            dd($tournament)
//            $single_notification["tournament_name"] = $tournament->name;
//            $single_notification["tournament_id"] = $tournament->id;
//            foreach ($tournament->image as $images){
//                if ($images->type == "badge"){
//                    $single_notification["tournament_badge"] = $images->image;
//                }
//
//            }

            $single_notification["created_at"] = $notification->created_at->toDateString();
            array_push($notifications,$single_notification);

        }
        //dd($notifications);
        return response()->json($notifications,'200');
    }
}
