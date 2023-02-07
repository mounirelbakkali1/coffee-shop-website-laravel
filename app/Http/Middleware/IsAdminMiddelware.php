<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function dd;
use function redirect;
use function response;

class IsAdminMiddelware
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()){
            $user = Auth::user();
            $user_role = $user->role;
            if ($user_role !== "admin") {
                return response()->json([
                    'message' => 'Unauthorized'
                ], 401);
            }

        }
        return $next($request);
    }
}
