<?php
define("APP_PATH", __DIR__ . '/app/');
require_once APP_PATH . 'config/config.php';
require_once __DIR__ . '/libs/helpers.php';
require_once 'vendor/autoload.php';
session_start();


use App\Core\Route;
use App\Middleware\CheckLoginMiddleware;
use App\Middleware\CheckLogoutMiddleware;
use App\Middleware\checkAdminRoleMiddleware;
use App\Middleware\CheckProviderRoleMiddleware;
use App\Middleware\CheckCustomerRoleMiddleware;


$router = new Route();
// Define your routes here





try {
    // Resolve the route
    $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
