<?php

namespace App\Middleware;

class checkAdminRoleMiddleware
{
    public function handle($requestUri, $next)
    {
        if ($_SESSION['user_role'] !== 'admin') {
            header('Location: /dashboard');
            exit;
        }
        // Continue to the next middleware or controller action
        return $next($requestUri);
    }
}
