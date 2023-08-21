<?php

namespace App\controllers;
use App\core\App;

use App\model\User;
use App\model\City;
use App\model\BoardingPoint;
use App\model\Coach;

class BusController{
   //city
  public function addCity(){

      session_start();
     User::isSessionExist($_SESSION['adminId']);

    
    
     $allCity= (new City())->showAllCity();
    
      $message=[
    
     'flagError'=>'',
     'flagComplete'=>'',
     'allCity'=>$allCity
      ]; 
     //dd ($allCity);
     return view("add-city",$message);

   }

   public function postAddCity(){
   	
    session_start();
     User::isSessionExist($_SESSION['adminId']);

   	$postedCity=[
     'cityName'=> ucwords($_POST['cityName'])
   	];
    
    $message=(new City)->addCity($postedCity);
    
    return view('add-city',$message);

   }

 public function editCity(){
   
    session_start();
     User::isSessionExist($_SESSION['adminId']);

    $allCity=(new City)->showAllCity();
    return view('edit-city',$allCity);

 }

 public function postSelectedCity(){
  
    session_start();
     User::isSessionExist($_SESSION['adminId']);

    $city=(new City)->showCityById($_POST['radio']);
   
    ///dd($city->getCityName());

   $message=[
    'selectCity'=>$city[0]->getCityName(),
    'errorMessage'=>'',
    'completeMessage'=>''
     ];
     
     $_SESSION['cityId']=$_POST['radio'];
     $_SESSION['cityName']=$city[0]->getCityName();
  //dd($message);
   //dd($message['selectCity'][0]->getCityName());
    return view('post-edit-city',$message);
  
 //echo $_POST['radio'];

 }

 public function postEditCity(){
 	  session_start();
     User::isSessionExist($_SESSION['adminId']);

   
       $postedValue=['cityName'=> ucwords($_POST['cityName']),
                  'id'=>$_SESSION['cityId']
      ];
   $message=(new City)->editCity($postedValue);
   return view('post-edit-city',$message);
     
 }
 public function removeCity(){
    
    session_start();
     User::isSessionExist($_SESSION['adminId']);

    $allCity=(new City)->showAllCity();
    $message=[
      'city'=>$allCity,
      'flag'=>''
    ];

    return view('remove-city',$message);

 }
 public function postRemoveCity(){
   session_start();
     User::isSessionExist($_SESSION['adminId']);


   $message=(new City)->removeCity($_POST['radio']);
   return view('remove-city',$message);
 }


 
 //boarding point
 public function addBoard(){

      session_start();
     User::isSessionExist($_SESSION['adminId']);

    
    
     $allBoardingPoint= (new BoardingPoint())->showAllBoardingPoint();
    
      $message=[
    
     'flagError'=>'',
     'flagComplete'=>'',
     'allBoard'=>$allBoardingPoint
      ]; 
     //dd ($allCity);
     return view("add-board",$message);

   }

   public function postAddBoard(){
   	
     session_start();
     User::isSessionExist($_SESSION['adminId']);

   	 $postedBoardingPoint=[
     'boardingPointName'=> ucwords($_POST['boardName'])
   	];
    
    $message=(new BoardingPoint)->addBoardingPoint($postedBoardingPoint);
    
    return view('add-board',$message);

   }

 public function editBoard(){
   
    session_start();
     User::isSessionExist($_SESSION['adminId']);

    $allBoard=(new BoardingPoint)->showAllBoardingPoint();
    return view('edit-board',$allBoard);

 }
  
 public function postSelectedBoard(){
  
    session_start();
     User::isSessionExist($_SESSION['adminId']);

    $board=(new BoardingPoint)->showBoardingPointById($_POST['radio']);
   
    ///dd($city->getCityName());

   $message=[
    'selectBoard'=>$board[0]->getBoardingPointName(),
    'errorMessage'=>'',
    'completeMessage'=>''
     ];
     
     $_SESSION['boardId']=$_POST['radio'];
     $_SESSION['boardName']=$board[0]->getBoardingPointName();
  //dd($message);
   //dd($message['selectCity'][0]->getCityName());
    return view('post-edit-board',$message);
  
 //echo $_POST['radio'];

 }

 public function postEditBoard(){
 	  session_start();
     User::isSessionExist($_SESSION['adminId']);

   
       $postedValue=['boardingPointName'=> ucwords($_POST['boardName']),
                  'id'=>$_SESSION['boardId']
      ];
   $message=(new BoardingPoint)->editBoardingPoint($postedValue);
   return view('post-edit-board',$message);

     
 }
 public function removeBoard(){
    
    session_start();
     User::isSessionExist($_SESSION['adminId']);

    $allBoard=(new BoardingPoint)->showAllBoardingPoint();
    $message=[
      'board'=>$allBoard,
      'flag'=>''
    ];

    return view('remove-board',$message);

 }
 
 public function postRemoveBoard(){
   session_start();
     User::isSessionExist($_SESSION['adminId']);


   $message=(new BoardingPoint)->removeBoardingPoint($_POST['radio']);
   return view('remove-board',$message);
 }   


 //Coach
 public function addCoach(){


      session_start();
     User::isSessionExist($_SESSION['adminId']);

    
    
     $allCoaches= (new Coach())->showAllCoaches();
    
      $message=[
    
     'flagError'=>'',
     'flagComplete'=>'',
     'allCoach'=>$allCoaches
      ]; 
     //dd ($allCity);
     return view("add-coach",$message);

   }

  public function postAddCoach(){

     session_start();
     User::isSessionExist($_SESSION['adminId']);

   	 $postedCoach=[
     'coachNo'=> ucwords($_POST['coachNo'])
   	];
    
    $message=(new Coach)->addCoach($postedCoach);
    
    return view('add-coach',$message);

  }

  public function editCoach(){

    session_start();
     User::isSessionExist($_SESSION['adminId']);

    $allCoach=(new Coach)->showAllCoaches();
    return view('edit-coach',$allCoach);


  }

  public function postSelectedCoach(){
  
    session_start();
     User::isSessionExist($_SESSION['adminId']);

    $coach=(new Coach)->showCoachById($_POST['radio']);
   
    ///dd($city->getCityName());

   $message=[
    'selectCoach'=>$coach[0]->getCoachNo(),
    'errorMessage'=>'',
    'completeMessage'=>''
     ];
     
     $_SESSION['coachId']=$_POST['radio'];
     $_SESSION['coachNo']=$coach[0]->getCoachNo();
  //dd($message);
   //dd($message['selectCity'][0]->getCityName());
    return view('post-edit-coach',$message);
  
 //echo $_POST['radio'];

  }

  public function postEditCoach(){
    session_start();
     User::isSessionExist($_SESSION['adminId']);

  
       $postedValue=['coachNo'=> ucwords($_POST['coachNo']),
                  'id'=>$_SESSION['coachId']
      ];
   $message=(new Coach)->editCoach($postedValue);
   return view('post-edit-coach',$message);


  }
    public function removeCoach(){
    
    session_start();
     User::isSessionExist($_SESSION['adminId']);

    $allCoach=(new Coach)->showAllCoaches();
    $message=[
      'coach'=>$allCoach,
      'flag'=>''
    ];

    return view('remove-coach',$message);

   }


public function postRemoveCoach(){
   session_start();
     User::isSessionExist($_SESSION['adminId']);


   $message=(new Coach)->removeCoach($_POST['radio']);
   return view('remove-coach',$message);
   }   
 }