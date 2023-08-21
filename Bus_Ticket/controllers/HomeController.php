<?php
  namespace App\controllers;
  //use App\core\App;
  use App\model\City;
   use App\model\Coach;
    use App\model\BoardingPoint;
  use App\model\CoachSchedule;
 class HomeController{

   public function setHome(){
    
     //session_start();
     //User::isSessionExist($_SESSION['adminId']);

    
    
     $allCity= (new City())->showAllCity();

     $messages=[
      'city'=>$allCity,
      'fromCityValue'=>'',
      'toCity'=>'',
      'toCityValue'=>'',
      'journeyDate'=>'',
      'journeyDateValue'=>'',
      'coachType'=>'',
      'flag'=>false,
      'emptyMessage'=>'',
      'searchCoaches'=>''

     ];
     //dd($allCity);
     //require 'views/home.view.php';
    

     return view('home',$messages);
   }



   public function searchCoachSchedule(){
     
  

  $coachSchedule=new CoachSchedule();
   $coachSchedule->setCityObj(new City);
  
  $messages=$coachSchedule->searchCoachSchedule($_POST);
  if($messages['flag']){
  	return view("show-seacrh-coaches",$messages);
  } 
  return view('home',$messages);
   //dd($_POST);

   }



}
