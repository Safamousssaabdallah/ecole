<?php
// public/index.php
require_once '../core/Controller.php';
require_once '../core/Model.php';
require_once '../core/Database.php';

$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Charge le contrôleur correspondant
$controllerFile = "../app/Controllers/{$controllerName}Controller.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerClass = ucfirst($controllerName) . 'Controller';
    $controller = new $controllerClass();
    $controller->$action();
} else {
    echo "Le contrôleur demandé n'existe pas.";
}
