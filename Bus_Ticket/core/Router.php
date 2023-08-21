<?php
  namespace App\core;

 class Router{

     public $routes=[
       'GET'=>[],
       'POST'=>[]

     ];

     public static function load($file){
      $router=new static;
      require $file;
      return $router;
     } 

     public function get($uri,$controller){
       
         $this->routes['GET'][$uri]=$controller;
     }

     public function post($uri,$controller){
       
         $this->routes['POST'][$uri]=$controller;
     }

     public function define($routes){

     $this->routes=$routes;

     } 

     public function direct($uri,$requestType){
         //$router= new self;
         //var_dump($router);

         if(array_key_exists($uri, $this->routes[$requestType])){
          
              return $this->callAction(...explode('@',$this->routes[$requestType][$uri]));

             //return $this->routes[$requestType][$uri];


         }
     
         throw new Exception('Ooops!!sorry,no routes define for this uri!'); 
     
     }

     private function callAction($controller,$action){

     	 $controller="App\\controllers\\{$controller}";
     	 $controller=new $controller();

     	 if(!method_exists($controller, $action)){

              throw new Exception("{$controller} doesnot respond to the {$action} action... ");

     	 }

     	      $controller->$action();


     }

 }