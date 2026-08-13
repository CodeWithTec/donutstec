<?php

/**
 * Simple PHP Router
 *
 * This script handles routing for a basic PHP application.
 * It maps request URIs to corresponding controller files.
 *
 * @package DonutsTec
 * @version 1.0
 
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$request = rtrim($request, '/');
$request = $request ?: '/';

$request = filter_var($request, FILTER_SANITIZE_URL);

if (!preg_match('#^[A-Za-z0-9/_-]+$#', $request) && $request !== '/') {
    http_response_code(400);
    exit('Invalid request.');
}

$routes = [
    '/'           => 'controller/index.php',
    '/about'      => 'controller/about.php',
    '/contact'    => 'controller/contact.php',
    '/services'   => 'controller/services.php',
    '/team'       => 'controller/team.php',
    '/portfolio'  => 'controller/portfolio.php',
    '/pricing'    => 'controller/pricing.php',
    '/careers'    => 'controller/careers.php',
];

if (array_key_exists($request, $routes)) {
    require $routes[$request];
} else {
    http_response_code(404);
    require 'controller/404.php';
}
*/
// ============================================== //

// Route definitions
$routers = [
    '/' => 'controller/index.php',
    '/about' => 'controller/about.php',
    '/contact' => 'controller/contact.php',
    '/services' => 'controller/services.php',
    '/team' => 'controller/team.php',
    '/portfolio' => 'controller/portfolio.php',
    '/pricing' => 'controller/pricing.php',
    '/careers' => 'controller/careers.php', // Fixed spelling
    '/blog' => 'controller/blog.php',
    '/support' => 'controller/support.php',
    '/clientlogin' => 'controller/clientlogin.php',
    '/threeinone' => 'controller/threeinone.php',
     
    // Admin Routes
    '/admin/dashboard' => 'controller/admin/dashboard.php',
    '/admin/users' => 'controller/admin/users.php',
    '/admin/support-tickets' => 'controller/admin/support.ticket.php',
    '/admin/blog' => 'controller/admin/blog.php',
    '/admin/invoices' => 'controller/admin/invoices.php',
    '/admin/messages' => 'controller/admin/messages.php',
    '/admin/settings' => 'controller/admin/settings.php',
    '/admin/projects' => 'controller/admin/projects.php',
    '/admin/logout' => 'controller/admin/logout.php',
    '/admin/clients' => 'controller/admin/clients.php',

 
    // Client Routes
    '/clients/dashboard' => 'controller/clients/dashboard.php',
    '/clients/projects' => 'controller/clients/project.php',
    '/clients/tickets' => 'controller/clients/support.tickets.php',
    '/clients/invoices' => 'controller/clients/invoices.php',
    '/clients/messages' => 'controller/clients/messages.php',
    '/clients/settings' => 'controller/clients/settings.php',
    '/clients/logout' => 'controller/clients/logout.php',
    '/clients/profile' => 'controller/clients/profile.php',
    '/clients/notifications' => 'controller/clients/notifications.php'
];

// Get the current request URI
$currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Remove trailing slash (except for "/")
if ($currentUri !== '/') {
    $currentUri = rtrim($currentUri, '/');
}

// Check if route exists
if (array_key_exists($currentUri, $routers)) {

    $file = $routers[$currentUri];

    if (file_exists($file)) {
        require $file;
    } else {
        http_response_code(500);
        die("Controller file not found: {$file}");
    }

} else {

    http_response_code(404);

    if (file_exists('controller/404.php')) {
        require 'controller/404.php';
    } else {
        echo "<h1>404 - Page Not Found</h1>";
    }
}


