<?php
/**
 * Created by PhpStorm.
 * User: younesdiouri
 * Date: 17/01/2018
 * Time: 12:49
 */

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $reqGuard = Auth::guard($guard);

        if($reqGuard->guest()) {
            return abort(401);
        }

        return $next($request);
    }
}