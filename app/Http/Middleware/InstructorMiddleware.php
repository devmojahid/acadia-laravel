<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class InstructorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $role = Auth::user()->role;
        dd($role);
        switch ($role) {
            case 'admin':
                return redirectToRoleDashboard($role);
                break;
            case 'student':
                // Student can only access student dashboard
                return redirectToRoleDashboard($role);
                break;
            case 'teacher':
                // Teacher can access teacher and student dashboards
                return redirectToRoleDashboard($role);
                break;
            default:
                // Default redirection if role doesn't match any case
                return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
