<?php
session_start();
$routes = [
    '/' => isset($_SESSION['user_id']) ? "profile.php" : "login.php",
    '/handleLogin' => 'handleLogin.php',
    '/handlePfp' => 'handlePfp.php'
];

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (array_key_exists($request, $routes)) {
    include $routes[$request];
} else {
    include '404.php';
}
?>
