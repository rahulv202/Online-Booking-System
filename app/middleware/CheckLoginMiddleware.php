<?php

namespace App\Middleware;

class CheckLoginMiddleware
{
    public function handle($request, $next)
    {
        if (isset($_SESSION['is_login'])) {
            header('Location: /dashboard');
            exit;
        }
        // Continue to the next middleware or controller if user is not logged in
        return $next($request);
    }
}
