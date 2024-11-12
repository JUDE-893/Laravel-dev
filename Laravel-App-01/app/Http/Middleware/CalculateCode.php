<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// --------- Middlewares----------
/*
  - powerful mechanism used to filter HTTP requests entring the Application
  - it acts as a layer between the HTTP request and its response, where proper actions are perfomed before or after the request is handled by hte routes
*/




class CalculateCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->query(key :'code') !== '200') {
          return redirect(to: 'error.page');
        }
        return $next($request);
    }
}
