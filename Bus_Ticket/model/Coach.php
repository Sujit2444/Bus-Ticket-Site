<?php
  namespace App\model;
  use App\core\App;
  class Coach{
  private $coachNo;
  private $coachObj;


  public function setCoachNo($number){

   $this->coachNo=$number;

  }

  public function getCoachNo(){

   return $this->coachNo;

  }

  public function getCoachObj(){

    return $this->coachObj;
  }


  public function showAllCoaches(){

  	return App::get('database')->selectAll('coach','Coach');
  }
  

 public function showCoachById($id){
    
    $coach= App::get('database')->selectAllById('coach','Coach',$id);
   //dd($city);
   $this->coachObj=$coach;
   return $coach;
   }


  public function addCoach($postedCoach){

   $message=[
    
    'flagError'=>'',
    'flagComplete'=>'',
    'allCoach'=>''
 ];
 $allCoach= App::get('database')->selectAll('coach','Coach');
 $message['allCoach']=$allCoach;

 if($postedCoach['coachNo']==''){

 	$message['flagError']='Coach Number Is Empty!';
    return $message;
   }
   else{
    
    
    foreach ($allCoach as $coach) {
    	if($coach->getCoachNo()== $postedCoach['coachNo']){
          $message['flagError']='Coach Already Exist!';
           return $message;
    	 }
    	 
     }

   App::get('database')->insert('coach',$postedCoach);
        $message['flagComplete']="Coach Registered!";
       //dd($message);
        $allCoach= App::get('database')->selectAll('coach','Coach');
        $message['allCoach']=$allCoach;
        return $message;
     
   }

 }

  public function editCoach($postedCoach){
     
     //echo count($postedCity);
     $message=[
  	   'selectCoach'=>$_SESSION['coachNo'],
       'errorMessage'=>'',
       'completeMessage'=>''
     ];
      if($postedCoach['coachNo']==''){

      	$message['errorMessage']='Coach Number Cannot be empty!';
        return $message;
      }else{
        $allCoach= App::get('database')->selectAll('coach','Coach');

         foreach ($allCoach as $coach) {
         if($coach->getCoachNo()== $postedCoach['coachNo']){
          $message['errorMessage']='Coach Already Exist!';
           return $message;
    	     }
    	 
         }

       
       App::get('database')->updateOneDetail('coach',$postedCoach);
       $message['completeMessage']='Coach Modified!';
        $_SESSION['coachNo']=null;
        $_SESSION['coachId']=null;
        $message['selectCoach']='';
       return $message;
      }

  }

  public function removeCoach($id){
  	$message=[
      'coach'=>'',
      'flag'=>''
    ];
  App::get('database')->deteteById('coach',$id);
    $message['coach']=$this->showAllCoaches();
  
   //dd($message['city']);
  $message['flag']='Coach Removed!';
    return $message;
 }


}