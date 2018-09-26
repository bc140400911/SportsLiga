<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use http\Exception;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email')

        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($response)

            : $this->sendResetLinkFailedResponse($request, $response);

    }
    public function sendResetLinkEmailWithApi(Request $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email')

        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponseWithApi($response)

            : $this->sendResetLinkFailedResponseWithApi($request, $response);

    }

    protected function sendResetLinkResponse($response)
    {

        return back()->with('status', trans($response));
    }
    protected function sendResetLinkResponseWithApi($response)
    {

        return ['status' => trans($response)];
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans($response)]);
    }
    protected function sendResetLinkFailedResponseWithApi(Request $request, $response)
    {
        $arr = array("error"=>"You are not register");
        return $arr;
//        return back()
//            ->withInput($request->only('email'))
//            ->withErrors(['email' => trans($response)]);
    }
}
