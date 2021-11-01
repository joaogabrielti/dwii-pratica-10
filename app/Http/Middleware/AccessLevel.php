<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessLevel {
    private $accessLevel = 0;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $level=0) {
        if ($this->accessLevel >= $level)
            return $next($request);
        return redirect(route('acesso-negado'));
    }
}
