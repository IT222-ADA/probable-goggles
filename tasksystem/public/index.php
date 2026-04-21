<?php

date_default_timezone_set('Asia/Manila');

//autoload
spl_autoload_register(function ($class){
    $paths = [
        __DIR__ . '/../app/Core/' . $class . '.php',
        __DIR__ . '/../app/Models/' . $class . '.php',
        __DIR__ . '/../app/Controllers/' . $class . '.php',
    ];

    foreach ($paths as $file){
        if(file_exists($file)){
            require_once $file;
            return;
        }
    }

});

//load session
// require_once __DIR__ .'/../app/Core/Session.php';
// Session::start();

//routes
$routes = require __DIR__ .'/../app/Config/routes.php';

//parse url
$url = $_GET['url'] ?? '/';
$url = '/' . trim($url, '/');

if(str_starts_with($url, '/public')){
    $url = substr($url, 7); //remove "/public"
}

if(!isset($routes[$url])){
    http_response_code(404);
    exit;
}

$route = explode('@', $routes[$url]);
$controllerName = $route[0] . 'Controller';
$methodName = $route[1] ?? 'index';

if(!class_exists($controllerName)){
    http_response_code(500);
    echo "<h1>Errpr: Controller {$controllerName} not found</h1>";
    exit;
}

$controller = new $controllerName();
if(!method_exists($controller, $methodName)){
    http_response_code(500);
    echo "<h1>Errpr: Method {$methodName} not founf in Controller {$controllerName}</h1>";
    exit;
}

$controller->$methodName();






?>