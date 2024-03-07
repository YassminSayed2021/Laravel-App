<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->age <= 30) {
            return redirect('/gethome');
        }
        return $next($request);             //send request deeply
    }
}


/*
1. create middle artisan
2. implementation handle function
3. Register middleware Kernel.php
4. assign middleware for specific route
5. test
*/