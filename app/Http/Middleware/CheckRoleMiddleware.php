<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
       public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->role==("admin")) {
            return $next($request);
        }
        return redirect('/');
    }
}
