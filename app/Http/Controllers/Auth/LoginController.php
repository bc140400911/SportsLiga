<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\User as User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    private $_user;
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectFacebook($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callbackFacebook($provider)
    {
        $user = new User();
        // when facebook call us a with token
        //dd(Socialite::driver($provider)->user());
        $social_user = $user->createOrGetFacebookUser(Socialite::driver($provider)->stateless()->user(),$provider);
        //dd($social_user);
        auth()->login($social_user);
        return redirect()->to('/');
    }

    public function __construct(User $user)
    {
        $this->_user = $user;
        $this->middleware('guest')->except('logout');
    }
    protected function authenticated(Request $request, $user)
    {

        $userRecord = $this->_user->findRecord($user->email);

        if ($userRecord->verify_status == 0){
            Auth::logout();

            return redirect('login')->with('message','you need to verify your email first.');
        }
        if ($userRecord->role == 1){
            return redirect('/admin');
        }else{
            return redirect('/');
        }
    }


}
