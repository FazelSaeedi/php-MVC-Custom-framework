<?php



use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$config = [
  'db' => [
     'user' => $_ENV['DB_USER'],
     'password' => $_ENV['DB_PASSWORD'],
     'host' => $_ENV['DB_host'],
     'port' => $_ENV['DB_port'],
     'dbname' => $_ENV['DB_name'],
  ]
];


$app = new Application(dirname(__DIR__) , $config);



$app->router->get('/' , [SiteController::class , 'home']);
$app->router->get('/contact' , [SiteController::class , 'contact']);


$app->router->post('/contact' , [SiteController::class , 'handlecontect']);
$app->router->get('/json' , [SiteController::class , 'Json']);



$app->router->post('/login' , [AuthController::class , 'login']);
$app->router->post('/register' , [AuthController::class , 'register']);



$app->router->get('/auth/test' , [AuthController::class , 'test']);


$app->run();

