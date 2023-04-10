<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = auth()->user();
        $lastActivity = session('last_activity');
    
        if ($user && $lastActivity && time() - $lastActivity > 1800) { // 1800 seconds = 30 minutes
            auth()->logout();
            session()->flush();
            return redirect('/login')->with('message', 'You have been logged out due to inactivity.');
        }
    
        session(['last_activity' => time()]);

        return $next($request);
    }
}
