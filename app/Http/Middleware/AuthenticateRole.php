<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $roleName
     * @return mixed
     * @internal param null|string $guard
     */
    public function handle($request, Closure $next, $roleName = 'admin')
    {
        $user = \Auth::user();
        if (!$user->isAdmin() && !$user->hasRole($roleName)
        ) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                \Log::error(\Auth::user()->name . " user does not have $roleName permissions.");
                $flash_notification = [
                    'message' => \Auth::user()->name . " user does not have $roleName permissions.",
                    'level' => 'danger'
                ];
                return redirect()->action('HomeController@home')->with('flash_notification', $flash_notification);
            }
        }

        return $next($request);
    }
}
