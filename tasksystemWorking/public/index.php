<?php
// Start session for Auth and Flash

// Set timezone
date_default_timezone_set('Asia/Manila');
// ----------------------------------------------------
// Autoload Classes (Core, Models, Controllers, Services)
// ----------------------------------------------------
spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/../app/Core/' . $class . '.php',
        __DIR__ . '/../app/Models/' . $class . '.php',
        __DIR__ . '/../app/Controllers/' . $class . '.php',
        __DIR__ . '/../app/Services/' . $class . '.php',
    ];

    foreach ($paths as $file) {
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// ----------------------------------------------------
// Load Session Management
// ----------------------------------------------------
require_once __DIR__ . '/../app/Core/Session.php';
Session::start();

// ----------------------------------------------------
// Load Routes Configuration
// ----------------------------------------------------
$routes = require __DIR__ . '/../app/Config/routes.php';

// ----------------------------------------------------
// Parse URL
// ----------------------------------------------------
$url = $_GET['url'] ?? '/';
$url = '/' . trim($url, '/');

// Remove leading "/public" if present
if (str_starts_with($url, '/public')) {
    $url = substr($url, 7); // remove "/public"
}

// ----------------------------------------------------
// Match route
// ----------------------------------------------------
if (!isset($routes[$url])) {
    http_response_code(404);
    require __DIR__ . '/../app/Views/errors/404.php';
    exit;
}
// Get controller and method from route
$route = explode('@', $routes[$url]);
$controllerName = $route[0] . 'Controller';
$methodName = $route[1] ?? 'index';

// ----------------------------------------------------
// Call Controller Method
// ----------------------------------------------------
if (!class_exists($controllerName)) {
    http_response_code(500);
    echo "<h1>Error: Controller {$controllerName} not found</h1>";
    exit;
}


$controller = new $controllerName();
if (!method_exists($controller, $methodName)) {
    http_response_code(500);
    echo "<h1>Error: Method {$methodName} not found in controller {$controllerName}</h1>";
    exit;
}
// Call the method with optional URL params
$controller->$methodName();
