<?php


require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Application;



$app = new Application(dirname(__DIR__));



$app->router->get('/' , [SiteController::class , 'home']);
$app->router->get('/contact' , [SiteController::class , 'contact']);


$app->router->post('/contact' , [SiteController::class , 'handlecontect']);
$app->router->post('/json' , [SiteController::class , 'Json']);



$app->router->post('/login' , [AuthController::class , 'login']);
$app->router->post('/register' , [AuthController::class , 'register']);

$app->router->get('auth/test' , [AuthController::class , 'test']);


$app->run();

