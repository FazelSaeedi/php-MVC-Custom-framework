<?php




use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Application;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
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


$app = new Application(__DIR__ , $config);

$app->db->applyMigrations();

