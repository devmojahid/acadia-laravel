<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        switch ($role) {
            case 'admin':
                // Admin can access admin and student dashboards
                if ($request->route()->getName() !== 'admin.dashboard' && $request->route()->getName() !== 'student.dashboard') {
                    return redirect()->route('admin.dashboard');
                }
                break;
            case 'student':
                // Student can only access student dashboard
                if ($request->route()->getName() !== 'student.dashboard') {
                    return redirect()->route('student.dashboard');
                }
                break;
            case 'teacher':
                // Teacher can access teacher and student dashboards
                if ($request->route()->getName() !== 'teacher.dashboard' && $request->route()->getName() !== 'student.dashboard') {
                    return redirect()->route('teacher.dashboard');
                }
                break;
            default:
                // Default redirection if role doesn't match any case
                return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
