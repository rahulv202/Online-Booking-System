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
$router->get('/register', 'RegisterController@index', [CheckLoginMiddleware::class]);
$router->post('/register', 'RegisterController@register', [CheckLoginMiddleware::class]);
$router->get('/login', 'LoginController@index', [CheckLoginMiddleware::class]);
$router->post('/login', 'LoginController@login', [CheckLoginMiddleware::class]);
$router->get('/dashboard', 'DashboardController@index', [CheckLogoutMiddleware::class]);
$router->get('/logout', 'DashboardController@logout', [CheckLogoutMiddleware::class]);

// Admin routes
$router->get('/manage-users', 'UserController@manageUsers', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->get('/edit-user/{id}', 'UserController@editUser', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->post('/update-user', 'UserController@updateUser', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->get('/delete-user/{id}', 'UserController@deleteUser', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->get('/manage-services', 'ServiceController@manageServices', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->get('/add-service', 'ServiceController@addService', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->post('/add-service', 'ServiceController@saveService', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->get('/edit-service/{id}', 'ServiceController@editService', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->post('/update-service', 'ServiceController@updateService', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->get('/delete-service/{id}', 'ServiceController@deleteService', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->get('/manage-bookings', 'BookingController@manageBookings', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->get('/confirmed-booking/{id}', 'BookingController@confirmedBooking', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->get('/cancelled-booking/{id}', 'BookingController@cancelledBooking', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->get('/completed-booking/{id}', 'BookingController@completedBooking', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);

try {
    // Resolve the route
    $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
