<?php

namespace App\Middleware;

class CheckProviderRoleMiddleware
{
    public function handle($requestUri, $next)
    {
        if ($_SESSION['user_role'] !== 'provider') {
            header('Location: /dashboard');
            exit;
        }
        // Continue to the next middleware or controller action
        return $next($requestUri);
    }
}
