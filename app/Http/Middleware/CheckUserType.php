<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    public function handle(Request $request, Closure $next, $type)
    {
        if (!Auth::check()) {
            return redirect('/login/' . $type);
        }

        if (Auth::user()->user_type !== $type) {
            Auth::logout();
            return redirect('/login/' . $type)->withErrors([
                'error' => 'Unauthorized access.'
            ]);
        }

        return $next($request);
    }
}