<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class verifyUserEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = User::findOrFail(Auth::id());
        if($user->first_name != 'hidayat'){
            Auth::logout();
            return redirect('login')->with('message','you are not verified user.');
        }
        return $next($request);
    }
}
