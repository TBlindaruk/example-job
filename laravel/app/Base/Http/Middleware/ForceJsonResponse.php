<?php
declare(strict_types=1);

namespace App\Base\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceJsonResponse
{
    public function handle(Request $request, Closure $next)
    {
        // actually it is needs to be changed, to do not set if exist present, but it is not a problem for that app
        $request->headers->set('Accept', 'application/json');
        
        return $next($request);
    }
}
