<?php

namespace App\Http\Middleware;

use App\Enums\UserEnum;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
//    public function handle(Request $request, Closure $next, $role): Response
//    {
////        if($request->user()->role !== $role ){
////            return redirect()->route('dashboard');
////        }
//
//        return $next($request);
//    }

    public function handle(Request $request, Closure $next, $role): Response
    {
        if ($request->user() && isset($request->user()->role)) {
            if ($request->user()->role !== $role) {
                // Redirect based on the role mismatch
                if ($request->user()->role === UserEnum::ROLE_ADMIN) {
                    return redirect()->route('admin.dashboard');
                } elseif ($request->user()->role === UserEnum::ROLE_USER) {
                    return redirect()->route('dashboard');
                }
            }
        }

        return $next($request);
    }
}
