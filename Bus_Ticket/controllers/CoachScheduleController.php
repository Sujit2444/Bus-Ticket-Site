<?php

namespace App\controllers;


use App\model\User;
use App\model\City;
use App\model\BoardingPoint;
use App\model\Coach;
use App\model\CoachSchedule;
use App\model\Ticket;
class CoachScheduleController{

 public function getCoachSchedule(){
 
  session_start();
     User::isSessionExist($_SESSION['adminId']);

  $obj=new CoachSchedule();
  $obj->setCoachObj(new Coach);
  $obj->setBoardObj(new BoardingPoint);
  $obj->setCityObj(new City);
  $coaches= $obj->getCoaches();
  return view('show-coaches',$coaches);
 }

 public function postCreateCoachSchedule(){
  
  $messages=['board'=>[],

           'city'=>[],
           'coach'=>[],
           'toCity' =>'',
           'journeyDate'=>'',
           'reportingTime'=>'',
           'departureTime'=>'',
           'boardingPoints'=>'',
           'seat'=>'',
           'seatPrice'=>'',
           'duration'=>'',
           'fromCityValue'=>'',
           'toCityValue'=>'',
           'journeyDateValue'=>'',
           'reportingTimeValue'=>'',
           'departureTimeValue'=>'',
           'boardingPointsValue'=>'',
           'seatValue'=>'',
           'seatPriceValue'=>'',
           'durationValue'=>'',  
           'errorValue'=>'',
           'completeValue'=>''  
    ];
   session_start();
     User::isSessionExist($_SESSION['adminId']);


   $_SESSION['selectedCoachId']=$_POST['radio'];
   $coachScheduleObj=new CoachSchedule();
   $coachScheduleObj->setCoachObj(new Coach);
   $coachScheduleObj->setBoardObj(new BoardingPoint);
   $coachScheduleObj->setCityObj(new City);

   $messages['board']= $coachScheduleObj->getBoardingPoints();
   $messages['city']=$coachScheduleObj->getCities();
   $messages['coach']=$coachScheduleObj->getCoach($_POST['radio']);

   return view('create-coachSchedule',$messages); 

 }

 public function saveCoachSchedule(){
    session_start();
    
     User::isSessionExist($_SESSION['adminId']);

    
      //dd($_POST);
    $coachScheduleObj=new CoachSchedule();
    $coachScheduleObj->setCoachObj(new Coach);
    $coachScheduleObj->setBoardObj(new BoardingPoint);
    $coachScheduleObj->setCityObj(new City);     
    $messages=$coachScheduleObj->saveCoachSchedule($_POST);

    $messages['board']= $coachScheduleObj->getBoardingPoints();
    $messages['city']=$coachScheduleObj->getCities();
    $messages['coach']=$coachScheduleObj->getCoach($_SESSION['selectedCoachId']);
   
    
    //dd($messages);
  
   return view('create-coachSchedule',$messages);
  }

  public function getAllCoachSchedule(){


    session_start();
     User::isSessionExist($_SESSION['adminId']);

   $obj=new CoachSchedule();
   $obj->setCoachObj(new Coach);
   $coaches= $obj->getCoaches();
   return view('show-all-coaches',$coaches);



  }

   public function postShowDateCoachSchedule(){

    //dd($_POST['radio']);
    session_start();
    User::isSessionExist($_SESSION['adminId']);

    $coachScheduleObj=new CoachSchedule();
    $coachScheduleObj->setCoachObj(new Coach);
    $coachScheduleObj->setCityObj(new City );
    $coachScheduleObj->setBoardObj(new BoardingPoint);

     $coachSchedule=$coachScheduleObj->showAll($_POST['radio']);

     return view('show-all-coach-schedule',$coachSchedule);

   }

   public function selectedCoachSchedule(){

       session_start();
       User::isSessionExist($_SESSION['adminId']);    
   
       $obj=new CoachSchedule();
       $coachSchedule=$obj->getSelctedCoachSchedule($_GET['id']);
        return view('selected-coach-schedule',$coachSchedule);
       //dd($_GET['id']);
   }


public function selectedSeat(){

      session_start();
       User::isSessionExist($_SESSION['adminId']);    
        
        $ticket=new Ticket();
        $ticket->setUserObj(new User);
        $user=$ticket->userDetailsForSelectedSeat($_GET['seat']);
        //dd($_GET['id']);
        return view('selected-user-detail',$user);
    }

}