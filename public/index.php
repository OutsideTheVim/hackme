<?php

session_start();

require_once '../vendor/autoload.php';

$route = isset($_GET['params']) ? $_GET['params'] : error();
$routeArr = explode("/", $route);

$check = $routeArr[0] . "Controller";

if (!class_exists(ucfirst($check))) {
    error();
} else {
    $controller = new $check;

    if (isset($routeArr[1])) {
        if (!method_exists(ucfirst($check), strtolower($routeArr[1]))) {
            error();
        } else {
            $method = $routeArr[1];
            $controller->$method();
        }
    } else {
        $controller->show();
    }
}
?>