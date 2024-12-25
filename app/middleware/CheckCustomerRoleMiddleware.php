<?php

namespace App\Middleware;

class CheckCustomerRoleMiddleware
{
    public function handle($requestUri, $next)
    {
        if ($_SESSION['user_role'] !== 'customer') {
            header('Location: /dashboard');
            exit;
        }
        // Continue to the next middleware or controller action
        return $next($requestUri);
    }
}
