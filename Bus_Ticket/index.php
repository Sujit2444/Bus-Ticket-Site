<?php

 use App\core\Router;
 use App\core\Request;
 require 'core/bootstrap.php';
 /*$users=$database->selectAll('user','User');
 //var_dump($users);
 //var_dump($pdoObj);



 require 'views/showuser.view.php';*/

 
 /*$router=new Router();

 require 'routes.php';

 $uri=trim($_SERVER['REQUEST_URI'],'/');
 //echo $uri; 
 require $router->direct($uri);
 */
 
 $router=Router::load('routes.php');

 $router->direct(Request::uri(),Request::method());