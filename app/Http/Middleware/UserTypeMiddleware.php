<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $type): Response
    {
        // تحقق من نوع المستخدم
        if ($request->user()->user_type !== $type) {
            return response()->json([
                'success' => false,
                'message' => 'ليس لديك صلاحية للدخول هنا'
            ], 403);
        }

        return $next($request);
    }
}
