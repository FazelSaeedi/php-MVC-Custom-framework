<?php


$app->router->get('/' , function (){
    echo 'this is home' ;
});


$app->router->get('/contact' , [SiteController::class , 'contact']);


$app->router->post('/contact' , [SiteController::class , 'handlecontect']);
$app->router->get('/json' , [SiteController::class , 'Json']);



$app->router->post('/login' , [AuthController::class , 'login']);
$app->router->post('/register' , [AuthController::class , 'register']);



$app->router->get('/auth/test' , [AuthController::class , 'test']);

?>