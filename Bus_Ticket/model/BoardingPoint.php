<?php
 namespace App\model;
 use App\core\App;


 class BoardingPoint{

 private $boardingPointName;

 private $boardingpointsObj;

 public function setBoardingPointName($name){

 $this->boardingPointName=$name;

 }

 public function getBoardingPointName(){

 	return $this->boardingPointName;
 }
 public function showBoardingPointById($id){
    
  return App::get('database')->selectAllById('boardingpoint','BoardingPoint',$id);
   //dd($city);

  }
 
 public function showAllBoardingPoint(){

  
  return App::get('database')->selectAll('boardingpoint','BoardingPoint');

 }

 public function getAllBoardingPoints($boardingPointsId){

  $boardingPointsId=explode(',',$boardingPointsId);
  $boardingpoints=[];

 foreach ($boardingPointsId as $id) {
  
  array_push($boardingpoints,$this->showBoardingPointById($id));
  }
  $this->boardingpointsObj=$boardingpoints; 
 return $boardingpoints;


 }


 public function getBoardingPointsObj(){

  return $this->boardingpointsObj;
 }


 public function addBoardingPoint($postedBoardingPoint){

   $message=[
    
    'flagError'=>'',
    'flagComplete'=>'',
    'allBoard'=>''
 ];
 $allBoardingPoint= App::get('database')->selectAll('boardingpoint','BoardingPoint');
 $message['allBoard']=$allBoardingPoint;

 if($postedBoardingPoint['boardingPointName']==''){

 	$message['flagError']='	Boarding Point Name Is Empty!';
    return $message;
   }
   else{
    
    
    foreach ($allBoardingPoint as $boardingPoint) {
    	if($boardingPoint->getBoardingPointName()== $postedBoardingPoint['boardingPointName']){
          $message['flagError']='Boarding Point name Already Exist!';
           return $message;
    	 }
    	 
     }

   App::get('database')->insert('boardingpoint',$postedBoardingPoint);
        $message['flagComplete']="BoardingPoint Registered!";
       //dd($message);
        $allBoardingPoint= App::get('database')->selectAll('boardingpoint','BoardingPoint');
        $message['allBoard']=$allBoardingPoint;
        return $message;
     
   }

 }

 //public function checkCityExist();

  public function editBoardingPoint($postedBoardingPoint){
     
     //echo count($postedCity);
     $message=[
  	   'selectBoard'=>$_SESSION['boardName'],
       'errorMessage'=>'',
       'completeMessage'=>''
     ];
      if($postedBoardingPoint['boardingPointName']==''){

      	$message['errorMessage']='Boarding Point Name Cannot be empty!';
        return $message;
      }else{
        $allBoard= App::get('database')->selectAll('boardingpoint','BoardingPoint');

         foreach ($allBoard as $board) {
         if($board->getBoardingPointName()== $postedBoardingPoint['boardingPointName']){
          $message['errorMessage']='Boarding Point name Already Exist!';
           return $message;
    	     }
    	 
         }

       
       App::get('database')->updateOneDetail('boardingpoint',$postedBoardingPoint);
       $message['completeMessage']='Boarding Point name Modified!';
        $_SESSION['boardName']=null;
        $_SESSION['boardId']=null;
        $message['selectBoard']='';
       return $message;
      }

  }

  public function removeBoardingPoint($id){
  	$message=[
      'board'=>'',
      'flag'=>''
    ];
  App::get('database')->deteteById('boardingpoint',$id);
    $message['board']=$this->showAllBoardingPoint();
  
   //dd($message['city']);
  $message['flag']='Boarding Point Removed!';
    return $message;
 }
 


 }