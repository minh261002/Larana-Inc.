<?php

namespace App\Http\Middleware;

use App\Enums\User\UserRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserHostMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('web')->check() || Auth::guard('web')->user()->role->value != UserRole::Host->value) {
            return redirect()->route('host.home');
        }
        return $next($request);
    }
}
