<?php

function vardump($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}
require __DIR__ . '/../vendor/autoload.php';

$route = $_GET['route'] ?? '';
$routes = require __DIR__ . '/../app/routes.php';

$isRouteFound = false;
foreach ($routes as $pattern => $controllerAndAction) {
    preg_match($pattern, $route, $matches);
    if (!empty($matches)) {
        $isRouteFound = true;
        break;
    }
}

if ($isRouteFound != true) {
    echo 'Страница не найдена!';
    return;
}

unset($matches[0]);

$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];

$controller = new $controllerName();
$controller->$actionName(...$matches);