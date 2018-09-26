<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Validator;
use App\Mail\VerifyUserEmail;

class RegisterController extends Controller
{
    private $_successStatus = 200;
    public function register(Request $request){
        $validator =  Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()){
            return response()->json(['error'=>$validator->errors()] ,401);
        }
        if (User::where('email', '=', $request->email)->count() > 0){
            return response()->json(['emailExits'=>"Email already exits"],"200");
        }else{
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            //$success['token'] = $user->createToken('sportsLiga')->accessToken;
            //$success['user'] = $user;
            Mail::to($user->email)->send(new VerifyUserEmail($user));
            return response()->json(['emailSend'=>"A verification mail send to your mail"],"200");
        }

    }
}
