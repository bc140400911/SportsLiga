<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

   public function __construct(User $user)
   {
       $this->user = $user;

   }

    public function show($id){
        $user = $this->user->show($id);
        return view('user.frontend.userProfile',compact('user'));
    }

    public function index(){
        $users = $this->user->fetchAll();
        return view('user.backend.show-users',['users'=>$users]);
    }
    public function update(Request $request,$id){

        $data = $request->all();
        $response = $this->user->updateProfile($data,$id);
        return $response;
    }

    public function destroy($id){
        $result = $this->user->remove($id);
        return response()->json(['result'=> $result]);
    }

}

