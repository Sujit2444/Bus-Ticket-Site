<?php


 namespace App\model;
 use App\core\App;

 class City{
 private $cityName;
 private $citiesObj=[];

 public function setCityName($name){

 $this->cityName=$name;

 }

 public function getCityName(){

 	return $this->cityName;
 }

 public function getCitiesObj(){

  return $this->citiesObj;
 }
 public function showCityById($id){
    
  $city= App::get('database')->selectAllById('city','City',$id);
   //dd($city);

  array_push($this->citiesObj,$city);

  return $city;
 }

 public function showAllCity(){

  $allCity= App::get('database')->selectAll('city','City');

  //dd($allCity);
  return $allCity;
 }
 public function addCity($postedCity){

   $message=[
    
    'flagError'=>'',
    'flagComplete'=>'',
    'allCity'=>''
 ];
 $allCity= App::get('database')->selectAll('city','City');
 $message['allCity']=$allCity;

 if($postedCity['cityName']==''){

 	$message['flagError']='City Name Is Empty!';
    return $message;
   }
   else{
    
    
    foreach ($allCity as $city) {
    	if($city->getCityName()== $postedCity['cityName']){
          $message['flagError']='City Already Exist!';
           return $message;
    	 }
    	 
     }

   App::get('database')->insert('city',$postedCity);
        $message['flagComplete']="City Registered!";
       //dd($message);
        $allCity= App::get('database')->selectAll('city','City');
        $message['allCity']=$allCity;
        return $message;
     
   }

 }

 //public function checkCityExist();

  public function editCity($postedCity){
     
     //echo count($postedCity);
     $message=[
  	   'selectCity'=>$_SESSION['cityName'],
       'errorMessage'=>'',
       'completeMessage'=>''
     ];
      if($postedCity['cityName']==''){

      	$message['errorMessage']='City Name Cannot be empty!';
        return $message;
      }else{
        $allCity= App::get('database')->selectAll('city','City');

         foreach ($allCity as $city) {
         if($city->getCityName()== $postedCity['cityName']){
          $message['errorMessage']='City Already Exist!';
           return $message;
    	     }
    	 
         }

       
       App::get('database')->updateOneDetail('city',$postedCity);
       $message['completeMessage']='City Modified!';
        $_SESSION['cityName']=null;
        $_SESSION['cityId']=null;
        $message['selectCity']='';
       return $message;
      }

  }

  public function removeCity($id){
  	$message=[
      'city'=>'',
      'flag'=>''
    ];
  App::get('database')->deteteById('city',$id);
    $message['city']=$this->showAllCity();
  
   //dd($message['city']);
  $message['flag']='City Removed!';
    return $message;
 }
 


 }