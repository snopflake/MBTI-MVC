<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'model/Model.class.php';
require_once 'model/MbtiModel.php';
require_once 'controller/MbtiController.php';

// Ambil controller dan method dari URL
$controller = isset($_GET['c']) ? $_GET['c'] : 'Mbti'; // Default ke controller 'Mbti'
$method = isset($_GET['m']) ? $_GET['m'] : 'index'; // Default ke method 'index'


$controllerFile = 'controller/' . $controller . 'Controller.php';

if (file_exists($controllerFile)) {

    require_once $controllerFile;

    // Periksa apakah class controller ada
    $controllerClass = $controller . 'Controller';
    if (class_exists($controllerClass)) {
        $controllerInstance = new $controllerClass();

        // Periksa apakah metode yang diminta ada
        if (method_exists($controllerInstance, $method)) {
            $id = isset($_GET['id']) ? $_GET['id'] : null; 
            $controllerInstance->$method($_GET['id'] ?? null);
        } else {
            die("Method '$method' tidak ditemukan dalam controller '$controllerClass'.");
        }
    } else {
        die("Controller class '$controllerClass' tidak ditemukan.");
    }
} else {
    die("File controller '$controllerFile' tidak ditemukan.");
}
?>
