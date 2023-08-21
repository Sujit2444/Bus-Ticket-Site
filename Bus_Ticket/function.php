<?php

function dd($value){
echo '<pre>';	
  die(var_dump($value));

echo '</pre>';
}


function view($name,$messages=[]){

	 return require "views/{$name}.view.php"; 
}

 function redirect($path){

 	  header("Location:/Bus_Ticket/{$path}");
 }