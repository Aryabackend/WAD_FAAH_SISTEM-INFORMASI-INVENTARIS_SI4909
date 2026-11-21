<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class LogRequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */

    

    public function handle(Request $request, Closure $next): Response
    {
        $response=$next($request);

        Log::info('HTTP request processed', [
            'method' => $request->method(),
            'path' => '/'.ltrim($request->path(),'/'),
            'user_id' => $request->user()?->id,
            'status' => $response->getStatusCode(),
            'timestamp' => now()->toIso8601String()
        ]);


        return $response;
    }
}
