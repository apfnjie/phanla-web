<?php

namespace App\Http\Middleware;

use Closure;

class IsAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->privilege->role != 2) {
            return response()->json([
                'errors' => ['message' => 'You do not have permission to perform this request']
            ], 403);
        }
        
        return $next($request);
    }
}
