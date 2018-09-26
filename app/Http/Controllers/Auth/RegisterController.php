<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Mail\VerifyUserEmail;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

//    protected $redirectTo = '/home';


    protected $redirectTo = '/login';
    private $_user;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {

        $this->_user = $user;


    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'verify_token' => str_random('25'),
        ]);
        Mail::to($user->email)->send(new VerifyUserEmail($user));
        return $user;

    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        Auth::logout();
        return redirect('login')->with('message','A verification link has been send to your email Address, you need to verify your email first.');
       // $this->guard()->login($user);

        //return $this->registered($request, $user)
          //  ?: redirect($this->redirectPath());
    }
    public function verifyUserEmail($email,$token){

        $user = User::where(['email'=> $email,'verify_token'=>$token])->first();
        if ($user){
            $user->verify_token    = '';
            $user->verify_status   = 1;
            if ($user->save())
            return redirect('login')->with('message','Congratulation! You have successfully verified your Email Login Now!');
        }else{

            return redirect('login')->with('message','Invalid Email or Token,  Your Email could not be verified');
        }

    }

}
