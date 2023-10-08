<?php

session_start();

require_once '../vendor/autoload.php';

if (!isset($_SESSION['id'])) {
    if (isset($_COOKIE['token'])) {
        foreach (GetJsonContent("users.json") as $userdata) {
            if ($_COOKIE['token'] == base64_encode(json_encode($userdata))) {
                $_SESSION['id'] = $userdata->username;
            }
        }
    }
}

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
