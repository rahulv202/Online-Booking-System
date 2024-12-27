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
$router->get('/admin/manage-users', 'UserController@manageUsers', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->get('/admin/edit-user/{id}', 'UserController@editUser', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->post('/admin/update-user', 'UserController@updateUser', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->get('/admin/delete-user/{id}', 'UserController@deleteUser', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->get('/admin/manage-services', 'ServiceController@manageServices', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->get('/admin/add-service', 'ServiceController@addService', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->post('/admin/add-service', 'ServiceController@saveService', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->get('/admin/edit-service/{id}', 'ServiceController@editService', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->post('/admin/update-service', 'ServiceController@updateService', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->get('/admin/delete-service/{id}', 'ServiceController@deleteService', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->get('/admin/manage-bookings', 'BookingController@manageBookings', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->get('/admin/confirmed-booking/{id}', 'BookingController@confirmedBooking', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->get('/admin/cancelled-booking/{id}', 'BookingController@cancelledBooking', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);
$router->get('/admin/completed-booking/{id}', 'BookingController@completedBooking', [CheckLogoutMiddleware::class, CheckAdminRoleMiddleware::class]);

// Provider routes
$router->get('/provider/manage-services', 'ServiceController@manageServices', [CheckLogoutMiddleware::class, CheckProviderRoleMiddleware::class]);
$router->get('/provider/add-service', 'ServiceController@addService', [CheckLogoutMiddleware::class, CheckProviderRoleMiddleware::class]);
$router->post('/provider/add-service', 'ServiceController@saveService', [CheckLogoutMiddleware::class, CheckProviderRoleMiddleware::class]);
$router->get('/provider/edit-service/{id}', 'ServiceController@editService', [CheckLogoutMiddleware::class, CheckProviderRoleMiddleware::class]);
$router->post('/provider/update-service', 'ServiceController@updateService', [CheckLogoutMiddleware::class, CheckProviderRoleMiddleware::class]);
$router->get('/provider/delete-service/{id}', 'ServiceController@deleteService', [CheckLogoutMiddleware::class, CheckProviderRoleMiddleware::class]);
$router->get('/provider/manage-bookings', 'BookingController@manageBookings', [CheckLogoutMiddleware::class, CheckProviderRoleMiddleware::class]);
$router->get('/provider/confirmed-booking/{id}', 'BookingController@confirmedBooking', [CheckLogoutMiddleware::class, CheckProviderRoleMiddleware::class]);
$router->get('/provider/cancelled-booking/{id}', 'BookingController@cancelledBooking', [CheckLogoutMiddleware::class, CheckProviderRoleMiddleware::class]);
$router->get('/provider/completed-booking/{id}', 'BookingController@completedBooking', [CheckLogoutMiddleware::class, CheckProviderRoleMiddleware::class]);

try {
    // Resolve the route
    $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
