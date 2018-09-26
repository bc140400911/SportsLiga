<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    private $_successStatus = 200;
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt( $credentials )){
            $user = Auth::user();
            //$success['token'] = $user->createToken('sportLiga')->accessToken;
            return response()->json($user , $this->_successStatus);
        }else{
            return response()->json(['error'=>"unauthorized"],'401');
        }
    }

    public function socialLogin(Request $request){

        $user  = User::updateOrCreate([
            'provider_user_id' => isset($request->provider_id) ? $request->provider_id : null
        ],[
            'first_name'  => isset($request->first_name) ? $request->first_name : null,
            'last_name'   => isset($request->last_name) ? $request->last_name : null,
            'email'       => isset($request->email) ? $request->email : null,
            'provider'    => isset($request->provider) ? $request->provider : null
        ]);
        return response()->json($user,'200');
    }
}
