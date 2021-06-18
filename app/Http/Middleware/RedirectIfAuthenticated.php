<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();
                switch ($user) {
                    case $user->role = User::role['admin']:
                        return redirect(RouteServiceProvider::ADMIN);
                        break;
                    case $user->role = User::role['reader']:
                        return redirect(RouteServiceProvider::READER);
                        break;
                    case $user->role = User::role['writer']:
                        return redirect(RouteServiceProvider::WRITER);
                        break;
                    case $user->role = User::role['checker']:
                        return redirect(RouteServiceProvider::CHECKER);
                        break;
                }

            }
        }

        return $next($request);
    }
}
