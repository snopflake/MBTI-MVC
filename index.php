<?php
session_start(); // Mulai sesi untuk memeriksa login

require_once 'model/Model.class.php';
require_once 'model/MbtiModel.php';
require_once 'model/UserModel.php';
require_once 'model/InfoModel.php';

require_once 'controller/Controller.class.php';
require_once 'controller/MbtiController.php';
require_once 'controller/AuthController.php';
require_once 'controller/InfoController.php';

$c = $_GET['c'] ?? 'Auth';
$m = $_GET['m'] ?? 'loginForm';

if (!isset($_SESSION['loggedin']) && $c !== 'Auth') {
    header('Location: ?c=Auth&m=loginForm');
    exit();
}

$controllerClass = $c . 'Controller';
$method = $m;

if (class_exists($controllerClass) && method_exists($controllerClass, $method)) {
    $controllerInstance = new $controllerClass();
    $controllerInstance->$method();
} else {
    echo "Halaman tidak ditemukan.";
}
?>
