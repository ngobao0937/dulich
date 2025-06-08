<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === null) {
            Auth::logout();
            abort(403, 'Tài khoản này chưa có vai trò. Vui lòng liên hệ với quản trị viên.');
        }

        return $next($request);
    }
}
