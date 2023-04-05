<?php

require_once __DIR__."/../core/Application.php";
require_once __DIR__."/../controllers/AuthController.php";

$app = new Application(dirname(__DIR__));

$app->router->get('/', function(){
	echo "Home";
});

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'handleLogin']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'handleRegister']);

$app->router->get('/account', []);
$app->run();

?>