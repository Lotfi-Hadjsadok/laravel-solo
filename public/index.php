<?php

use App\Controllers\BlogController;
use Router\Router;

require_once '../vendor/autoload.php';
$url =  $_GET['url'];
$router = new Router($url);
$router->get('/',array(BlogController::class,'index'));
$router->get('/post/:id/:name',array(BlogController::class,'show'));
$router->run();