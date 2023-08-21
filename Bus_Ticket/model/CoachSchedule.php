<?php
namespace App\model;
 use App\core\App;
 use App\model\Coach;


 class CoachSchedule{

 private $coachObj;
 private $boardingPointObj;
 private $cityObj;
 private $coachId;
 
// private $coaches=[];
 private $boardingPoints;
// private $cities=[];
 private $leavingPlace;
 private $goingPlace;
 private $journeyDate;
 private $reportingTime;
 private $departureTime;
 private $coachType;
 //private $boardingPoint=[];
 private $seats;
 private $seatPrice;
 private $reservedSeat;
 private $duration;
  //private $selectedSeats=[];

  /*public function __construct($coachObj,$boardingPointObj,$cityObj){

  $this->coachObj=$coachObj;
  $this->boardingPointObj=$boardingPointObj;
  $this->cityObj=$cityObj;

  }*/

  public function getBoardingPoint(){
        //dd($this->boardingPoints);
          //dd($this->boardingPointObj);

      return $this->boardingPointObj->getAllBoardingPoints($this->boardingPoints);
    //return $this->boardingPoints;
  }
   public function setSeatPrice($seatPrice){

     $this->seatPrice=$seatPrice;
   }

   public function getSeatPrice(){

     return $this->seatPrice;
   }

   public function setDuration($duration){

    $this->duration=$duration;

   }

   public function getDuration(){

    return $this->duration;

   }

   public function setCoachType($coachType){

    $this->coachType=$coachType;

   }

   public function getCoachType(){

    return $this->coachType;

   }
   public function setJourneyDate($journeyDate){
    $this->journeyDate=$journeyDate;
   }

   public function getJourneyDate(){
    return $this->journeyDate;
   }

   public function setReportingTime($reportingTime){
    $this->reportingTime=$reportingTime;
   }

   public function getReportingTime(){
    
   $time = $this->reportingTime; 
     return date('h:i:s a', strtotime($time));
    //return $this->reportingTime;
   }

   public function setDepartureTime($departure){
     $this->departureTime=$departureTime;
   }
   
   public function getDepartureTime(){
    $time = $this->departureTime; 
     return date('h:i:s a', strtotime($time));
   }
   
    public function setReservedSeat($reservedSeat){
     $this->reservedSeat=$reservedSeat;

    }
    public function getReservedSeat(){
     return $this->reservedSeat;

    }
   public function setSeats($seats){
    $this->seats=$seats;

   }

   public function getSeats(){

    return $this->seats;

   }
   public function setLeavingPlace($leavingPlace){
   
    $this->leavingPlace=$leavingPlace;

   }
  public function getLeavingPlace(){

    return $this->leavingPlace;
  }

    public function setGoingPlace($goingPlace){
   
    $this->goingPlace=$goingPlace;

   }

   public function getGoingPlace(){
    return $this->goingPlace;

   }

  
   
  public function setCoachId($coachId){
   $this->coachId=$coachId;

    }

   public function getCoachId(){
    
    return $this->coachId;

   }

  public function setCoachObj($coachObj){
   $this->coachObj=$coachObj;

  } 


  
  public function getCoachObj(){


   return $this->coachObj;

  } 


  public function setBoardObj($boardingPointObj){
   $this->boardingPointObj=$boardingPointObj;

  } 


  
  public function getBoardObj(){
   return $this->boardingPointObj;

  } 


  public function setCityObj($cityObj){
   $this->cityObj=$cityObj;

  } 


  
  public function getCityObj(){
   return $this->cityObj;

  } 


  public function getCoaches(){

   return $this->coachObj->showAllCoaches();

   }

   public function getBoardingPoints(){

   	  return $this->boardingPointObj->showAllBoardingPoint();
   } 

   public function getCities(){

   	return $this->cityObj->showAllCity();
   }
  
   public function getCoach($id){
    // dd( $this->coachObj->showCoachById($id));
   	return $this->coachObj->showCoachById($id);
   }


 


   public function getCoachName(){
    
      $coachObj=new Coach();
       $coachObj=$coachObj->showCoachById($this->coachId);

       return $coachObj;

   }


   public function showCoachScheduleById($id){

    //dd($id);
    return App::get('database')->selectAllById(
      'coachschedule','CoachSchedule',$id);
    
   }


    public function getAllCoachSchedule(){

       $getAllCoachSchedule= App::get('database')->selectAll('coachschedule','CoachSchedule');

       //dd($getAllCoachSchedule);
       return $getAllCoachSchedule;

    }


    public function showAll($id){
      

     $coachSchedule=App::get('database')->selectAllByOneDetail(
      'coachschedule','CoachSchedule',['coachId'=>$id]);

      //dd($coachSchedule);
     foreach ($coachSchedule as $schedule) {
         
          $this->setCoachSchedule($schedule);
     }
     //dd($coachSchedule);

     return $coachSchedule;
    }

    private function setCoachSchedule($schedule){

       
         $schedule->setCoachObj(new Coach);
          $schedule->setCityObj(new City);
          $schedule->setBoardObj(new boardingPoint);
          $schedule->boardingPointObj->
          getAllBoardingPoints($schedule->boardingPoints);
          $schedule->cityObj->showCityById($schedule->leavingPlace);
          $schedule->cityObj->showCityById($schedule->goingPlace);
          //dd($schedule->coachId);
          $schedule->coachObj->showCoachById($schedule->coachId );
  
         return $schedule;

    }

    public function getSelctedCoachSchedule($coachScheduleId){

     $coachSchedule=$this->showCoachScheduleById($coachScheduleId);
            $coachSchedule=$this->setCoachSchedule($coachSchedule[0]); 
                // dd($coachSchedule);
    
        //dd($coachSchedule->id);
      $_SESSION['coachScheduleId']=$coachSchedule->id;
      return $coachSchedule; 
    }



   public function saveCoachSchedule($postedvalue){
     $messages=[
      'toCity' =>'',
      'journeyDate'=>'',
      'reportingTime'=>'',
      'departureTime'=>'',
      'boardingPoints'=>'',
      'seat'=>'',
      'seatPrice'=>'',
      'duration'=>'',
      'fromCityValue'=>'',
      
      'toCityValue' => '' ,
      
      'journeyDateValue' => '',
      
      'reportingTimeValue'=>'',
      
      'departureTimeValue'=>'',
      'boardingPointsValue'=>'',
      'seatValue'=>'',
      'seatPriceValue'=>'',
      'durationValue'=>'',  
      'errorValue'=>'',
      'completeValue'=>''     
     ];
     //dd($postedvalue);

    if($postedvalue['journeyDate']==''|| $postedvalue['reportingTime']==''||
      $postedvalue['departureTime']==''||$postedvalue['seat']==''||$postedvalue['seatPrice']==''||
      $postedvalue['duration']==''){
       

        if($postedvalue['journeyDate']==''){
          $messages['journeyDate']='Journey Date Can not be empty!';
          
          $messages['fromCityValue']=$postedvalue['fromCity'];
          $messages['toCityValue']=$postedvalue['toCity'];
          $messages['reportingTimeValue']=$postedvalue['reportingTime'];
          $messages['departureTimeValue']=$postedvalue['departureTime'];
          $messages['coachTypeValue']=$postedvalue['coachType'];
          $messages['seatValue']=$postedvalue['seat'];
          $messages['seatPriceValue']=$postedvalue['seatPrice'];
          $messages['durationValue']=$postedvalue['duration'];
          if(isset($postedvalue['checkbox'])){
          $messages['boardingPointsValue']=$postedvalue['checkbox'];
        
          }
        }

        if($postedvalue['reportingTime']==''){
          $messages['reportingTime']='Reporting Time Can not be empty!';
          
          $messages['fromCityValue']=$postedvalue['fromCity'];
          $messages['toCityValue']=$postedvalue['toCity'];
          $messages['journeyDateValue']=$postedvalue['journeyDate'];
          $messages['departureTimeValue']=$postedvalue['departureTime'];
          $messages['coachTypeValue']=$postedvalue['coachType'];
          $messages['seatValue']=$postedvalue['seat'];
          $messages['seatPriceValue']=$postedvalue['seatPrice'];
          $messages['durationValue']=$postedvalue['duration'];
          if(isset($postedvalue['checkbox'])){
          $messages['boardingPointsValue']=$postedvalue['checkbox'];
           }
        }

      if($postedvalue['departureTime']==''){
          $messages['departureTime']='Dparture Time Can not be empty!';
          
          $messages['fromCityValue']=$postedvalue['fromCity'];
          $messages['toCityValue']=$postedvalue['toCity'];
          $messages['reportingTimeValue']=$postedvalue['reportingTime'];
          $messages['journeyDateValue']=$postedvalue['journeyDate'];
          $messages['coachTypeValue']=$postedvalue['coachType'];
          $messages['seatValue']=$postedvalue['seat'];
          $messages['seatPriceValue']=$postedvalue['seatPrice'];
          $messages['durationValue']=$postedvalue['duration'];
          if(isset($postedvalue['checkbox'])){
          $messages['boardingPointsValue']=$postedvalue['checkbox'];
           }
        }

      if($postedvalue['seat']==''){
          $messages['seat']='Seat Can not be empty!';

          $messages['fromCityValue']=$postedvalue['fromCity'];
          $messages['toCityValue']=$postedvalue['toCity'];
          $messages['reportingTimeValue']=$postedvalue['reportingTime'];
          $messages['departureTimeValue']=$postedvalue['departureTime'];
          $messages['coachTypeValue']=$postedvalue['coachType'];
          $messages['journeyDateValue']=$postedvalue['journeyDate'];
          $messages['seatPriceValue']=$postedvalue['seatPrice'];
          $messages['durationValue']=$postedvalue['duration'];
          if(isset($postedvalue['checkbox'])){
          $messages['boardingPointsValue']=$postedvalue['checkbox'];
        
           }
        }

        if($postedvalue['seatPrice']==''){
          $messages['seatPrice']='Seat Price Can not be empty!';

          $messages['fromCityValue']=$postedvalue['fromCity'];
          $messages['toCityValue']=$postedvalue['toCity'];
          $messages['reportingTimeValue']=$postedvalue['reportingTime'];
          $messages['departureTimeValue']=$postedvalue['departureTime'];
          $messages['coachTypeValue']=$postedvalue['coachType'];
          $messages['seatValue']=$postedvalue['seat'];
          $messages['journeyDateValue']=$postedvalue['journeyDate'];
          $messages['durationValue']=$postedvalue['duration'];
           if(isset($postedvalue['checkbox'])){

          $messages['boardingPointsValue']=$postedvalue['checkbox'];
            }
        }

        if($postedvalue['duration']==''){
          $messages['duration']='Duration Can not be empty!';
          
          $messages['fromCityValue']=$postedvalue['fromCity'];
          $messages['toCityValue']=$postedvalue['toCity'];
          $messages['reportingTimeValue']=$postedvalue['reportingTime'];
          $messages['departureTimeValue']=$postedvalue['departureTime'];
          $messages['coachTypeValue']=$postedvalue['coachType'];
          $messages['seatValue']=$postedvalue['seat'];
          $messages['seatPriceValue']=$postedvalue['seatPrice'];
          $messages['journeyDateValue']=$postedvalue['journeyDate'];
          if(isset($postedvalue['checkbox'])){
          $messages['boardingPointsValue']=$postedvalue['checkbox'];
             }
        }
       
        if(isset($postedvalue['checkbox'])){
          
          
          $messages['fromCityValue']=$postedvalue['fromCity'];
          $messages['toCityValue']=$postedvalue['toCity'];
          $messages['reportingTimeValue']=$postedvalue['reportingTime'];
          $messages['departureTimeValue']=$postedvalue['departureTime'];
          $messages['coachTypeValue']=$postedvalue['coachType'];
          $messages['seatValue']=$postedvalue['seat'];
          $messages['seatPriceValue']=$postedvalue['seatPrice'];
          $messages['journeyDateValue']=$postedvalue['journeyDate'];
          
          $messages['durationValue']=$postedvalue['duration'];
        }else{

             //echo 'okk';
           $messages['boardingPoints']='Boarding Point Can not be empty!';
        }
       return $messages;
    }
    else{
             
             //dd($postedvalue);
             if($postedvalue['fromCity']==$postedvalue['toCity']){
             
             $messages['toCity']="city name can not be same...";
             
             $messages['fromCityValue']=$postedvalue['fromCity'];
             //$messages['toCityValue']=$postedvalue['toCity'];
             $messages['reportingTimeValue']=$postedvalue['reportingTime'];
             $messages['departureTimeValue']=$postedvalue['departureTime'];
             $messages['coachTypeValue']=$postedvalue['coachType'];
             $messages['seatValue']=$postedvalue['seat'];
             $messages['seatPriceValue']=$postedvalue['seatPrice'];
             $messages['journeyDateValue']=$postedvalue['journeyDate'];
          
             $messages['boardingPointsValue']=$postedvalue['checkbox'];
             
             $messages['durationValue']=$postedvalue['duration'];
             
            }


       $date1=date_create($postedvalue['journeyDate']." " .$postedvalue['reportingTime']);
       $date2=date_create($postedvalue['journeyDate']." " .$postedvalue['departureTime']);
       //dd($date2);

     
       
   

       $diff=date_diff($date1,$date2);
        
           $diff=$diff->format("%R,%H,%i");
          $diff=explode(',', $diff);
            

            $totalMinutes=0;
          if($diff[0]=='-'){
               //$totalHours= -($diff[1]*24)-$diff[2];
                //dd($totalHours);
               $totalMinutes= -($diff[1]*60)-$diff[2];
             }elseif($diff[0]=='+' ){
                   
                    $totalMinutes=($diff[1]*60)+$diff[2];
               //dd($totalHours);
             }
  
          // dd($totalMinutes);
        
        if($totalMinutes<=0 ){
             
          $messages['departureTime']='departure Time must be greater than reporting time';
        
            $messages['fromCityValue']=$postedvalue['fromCity'];
            
            $messages['toCityValue']=$postedvalue['toCity'];
            
            $messages['reportingTimeValue']=$postedvalue['reportingTime'];
            $messages['departureTimeValue']=$postedvalue['departureTime'];
            $messages['coachTypeValue']=$postedvalue['coachType'];
            $messages['seatValue']=$postedvalue['seat'];
            $messages['seatPriceValue']=$postedvalue['seatPrice'];
            $messages['journeyDateValue']=$postedvalue['journeyDate'];
          
            $messages['boardingPointsValue']=$postedvalue['checkbox'];
             
            $messages['durationValue']=$postedvalue['duration'];


        }

        if($postedvalue['seat']<0){
          
          $messages['seat']='seat must be greater than zero';
        
            $messages['fromCityValue']=$postedvalue['fromCity'];
            $messages['toCityValue']=$postedvalue['toCity'];
            $messages['reportingTimeValue']=$postedvalue['reportingTime'];
            $messages['departureTimeValue']=$postedvalue['departureTime'];
            $messages['coachTypeValue']=$postedvalue['coachType'];
            //$messages['seatValue']=$postedvalue['seat'];
            $messages['seatPriceValue']=$postedvalue['seatPrice'];
            $messages['journeyDateValue']=$postedvalue['journeyDate'];
          
            $messages['boardingPointsValue']=$postedvalue['checkbox'];
             
            $messages['durationValue']=$postedvalue['duration'];
 
        }

        if($postedvalue['seatPrice']<0){
          
          $messages['seatPrice']='seat price must be greater than zero';
        
            $messages['fromCityValue']=$postedvalue['fromCity'];
            $messages['toCityValue']=$postedvalue['toCity'];
            $messages['reportingTimeValue']=$postedvalue['reportingTime'];
            $messages['departureTimeValue']=$postedvalue['departureTime'];
            $messages['coachTypeValue']=$postedvalue['coachType'];
            $messages['seatValue']=$postedvalue['seat'];
            //$messages['seatPriceValue']=$postedvalue['seatPrice'];
            $messages['journeyDateValue']=$postedvalue['journeyDate'];
          
            $messages['boardingPointsValue']=$postedvalue['checkbox'];
             
            $messages['durationValue']=$postedvalue['duration'];
 
        }


        if($postedvalue['duration']<0){
          
          $messages['duration']='duration must be greater than zero';
        
            $messages['fromCityValue']=$postedvalue['fromCity'];
            $messages['toCityValue']=$postedvalue['toCity'];
            $messages['reportingTimeValue']=$postedvalue['reportingTime'];
            $messages['departureTimeValue']=$postedvalue['departureTime'];
            $messages['coachTypeValue']=$postedvalue['coachType'];
            $messages['seatValue']=$postedvalue['seat'];
            $messages['seatPriceValue']=$postedvalue['seatPrice'];
            $messages['journeyDateValue']=$postedvalue['journeyDate'];
          
            $messages['boardingPointsValue']=$postedvalue['checkbox'];
             
            //$messages['durationValue']=$postedvalue['duration'];
 
        } 

        date_default_timezone_set('Asia/Dhaka');               
        //$currentDate=date("Y/m/d,H:i:s");
        $currentDate=date("Y/m/d H:i");
        //dd($currentDate);   
            $date3=date_create($postedvalue['journeyDate']." " .$postedvalue['departureTime']);
        $date4=date_create($currentDate);
        $diff2=date_diff($date4,$date3);
        
        $diff2=$diff2->format("%R,%d,%H,%i");
        $diff2=explode(',', $diff2);
         $totalHr=0;
         $totalMins=0;
          
          if($diff2[0]=='-'){
               
               $totalHr= -($diff2[1]*24)-$diff2[2];
                
               $totalMins= ($totalHr*60)-$diff2[3];
             }elseif($diff2[0]=='+' ){
                   $totalHr= ($diff2[1]*24)+$diff2[2];
          
                  $totalMins= ($totalHr*60)+$diff2[3];
                  
             }       
        //dd($diff2->format("%R%a"));
        if($totalMins<0){
           $messages['journeyDate']='Ooops!wrong Date selection! date donot exist!';
        
            $messages['fromCityValue']=$postedvalue['fromCity'];
            $messages['toCityValue']=$postedvalue['toCity'];
            $messages['reportingTimeValue']=$postedvalue['reportingTime'];
            $messages['departureTimeValue']=$postedvalue['departureTime'];
            $messages['coachTypeValue']=$postedvalue['coachType'];
            $messages['seatValue']=$postedvalue['seat'];
            $messages['seatPriceValue']=$postedvalue['seatPrice'];
            $messages['journeyDateValue']=$postedvalue['journeyDate'];
          
            $messages['boardingPointsValue']=$postedvalue['checkbox'];
             
            $messages['durationValue']=$postedvalue['duration'];


        }

        //dd("here");
       $durationFlag=true;


         if($postedvalue['fromCity']!=$postedvalue['toCity'] &&
            $totalMinutes>0 && $postedvalue['seat']>0
            && $postedvalue['seatPrice']>0 && $postedvalue['duration']>0
            &&$totalMins>=0){
             $allCoaches=$this->getAllCoachSchedule();
             $backwardTempTimeDiff=0;
             $forwardTempTimeDiff=0;
             $backwardTempTime=date_create('0000-00-00 , 00:00');
             $forwardTempTime=date_create('0000-00-00 , 00:00');
             $totalHours2=0;
             $totalMinutes2=0;
             $forwardTempTimeDuration=0;
             

             $date6;
             $check=0;
              $sameFlag=true;
              $firstCoachFlag=false;
            foreach ($allCoaches as $coach ) {
               if($_SESSION['selectedCoachId'] ==$coach->coachId){

                 $date5=date_create($coach->journeyDate." " .$coach->departureTime);
          $date6=date_create($postedvalue['journeyDate']." " .$postedvalue['departureTime']);
       
           $diff3=date_diff($date5,$date6);
        
          //dd($diff->format("%R%H%i"));
            $difference=$diff3->format("%R,%a,%H,%i");
            $difference=explode(',', $difference);
             
              //dd($difference);
    
            if($difference[0]=='-'){
               $totalHours2= -($difference[1]*24)-$difference[2];
                //dd($totalHours);
               $totalMinutes2=($totalHours2*60)-$difference[3];
             }elseif($difference[0]=='+' ){

                   $totalHours2=($difference[1]*24)+$difference[2];
                    $totalMinutes2=($totalHours2*60)+$difference[3];
               //dd($totalHours);
             }
                //$check=$totalMinutes2;

             if($totalMinutes2==0){
                 
                  // dd('here!');
                 $messages['errorValue']=" sry your coach schedule alrady exist in same time! :(";
                 $durationFlag=false;
                   
                   $sameFlag=false;
                   
                   $messages['fromCityValue']=$postedvalue['fromCity'];
            
                   $messages['toCityValue']=$postedvalue['toCity'];
            
                   $messages['reportingTimeValue']=$postedvalue['reportingTime'];
                   $messages['departureTimeValue']=$postedvalue['departureTime'];
                   $messages['coachTypeValue']=$postedvalue['coachType'];
                   $messages['seatValue']=$postedvalue['seat'];
                   $messages['seatPriceValue']=$postedvalue['seatPrice'];
                   $messages['journeyDateValue']=$postedvalue['journeyDate'];
          
                   $messages['boardingPointsValue']=$postedvalue['checkbox'];
             
                   $messages['durationValue']=$postedvalue['duration'];


                    break;
                 
                 }
                 elseif($totalMinutes2<0){

                   if($backwardTempTimeDiff==0){
                         $backwardTempTimeDiff=$totalMinutes2;
                         $backwardTempTime=$date5;   
                    }
                   elseif($backwardTempTimeDiff<$totalMinutes2){
                   $backwardTempTimeDiff=$totalMinutes2;
                   $backwardTempTime=$date5;
                   }

                 }else{

                  if($forwardTempTimeDiff==0){
                         $forwardTempTimeDiff=$totalMinutes2;
                         $forwardTempTime=$date5;
                         $forwardTempTimeDuration=$coach->duration;   
                    }
                   elseif($forwardTempTimeDiff>$totalMinutes2){
                   $forwardTempTimeDiff=$totalMinutes2;
                   $forwardTempTime=$date5;
                   $forwardTempTimeDuration=$coach->duration;

                   }                        

                 }


                 $firstCoachFlag=true;

               }

             }

            // dd($check);

              
            if($forwardTempTimeDiff==0 && $sameFlag && $firstCoachFlag){
            //dd("here");
            $totalHours3=0;
            $totalMinutes3=0;
            $diff4=date_diff($date6,$backwardTempTime);       
            $difference2=$diff4->format("%R,%a,%H,%i");
            $difference2=explode(',', $difference2);
             
              //dd($difference);
    
            if($difference2[0]=='-'){
               $totalHours3= -($difference2[1]*24)-$difference2[2];
                //dd($totalHours);
               $totalMinutes3=($totalHours3*60)-$difference2[3];
             }elseif($difference2[0]=='+' ){
                   $totalHours3=($difference2[1]*24)+$difference2[2];
                    $totalMinutes3=($totalHours3*60)+$difference2[3];
               //dd($totalHours);
             }

             if($totalMinutes3<=($postedvalue['duration']*60)){
              $backwardTempTime= $backwardTempTime->format('Y-m-d H:i:s');

               $messages['errorValue']=" sry you cannot assign schedule for this coach!coach schedule is clash with anoter coach schedule $backwardTempTime and your posted duration ".$postedvalue['duration']."hours !! :(";
                 
                 $durationFlag=false;
                 
                 $messages['fromCityValue']=$postedvalue['fromCity'];
            
                  $messages['toCityValue']=$postedvalue['toCity'];
            
                  $messages['reportingTimeValue']=$postedvalue['reportingTime'];
                 $messages['departureTimeValue']=$postedvalue['departureTime'];
                 $messages['coachTypeValue']=$postedvalue['coachType'];
                 $messages['seatValue']=$postedvalue['seat'];
                 $messages['seatPriceValue']=$postedvalue['seatPrice'];
                 $messages['journeyDateValue']=$postedvalue['journeyDate'];
          
                 $messages['boardingPointsValue']=$postedvalue['checkbox'];
             
                 $messages['durationValue']=$postedvalue['duration'];


             }
                                   
             }
          elseif($backwardTempTimeDiff!=0 && $forwardTempTimeDiff!=0 && $sameFlag &&$firstCoachFlag){
            $totalHours3=0;
            $totalMinutes3=0;
            $diff4=date_diff($date6,$backwardTempTime);       
            $difference2=$diff4->format("%R,%a,%H,%i");
            $difference2=explode(',', $difference2);
             
              //dd($difference);
    
            if($difference2[0]=='-'){
               $totalHours3= -($difference2[1]*24)-$difference2[2];
                //dd($totalHours);
               $totalMinutes3=($totalHours3*60)-$difference2[3];
             }elseif($difference2[0]=='+' ){
                   $totalHours3=($difference2[1]*24)+$difference2[2];
                    $totalMinutes3=($totalHours3*60)+$difference2[3];
               //dd($totalHours);
             }

             if($totalMinutes3<=($postedvalue['duration']*60)){
                
                $backwardTempTime= $backwardTempTime->format('Y-m-d H:i:s');
    
               $messages['errorValue']=" sry you cannot assign schedule for this coach!coach schedule is clash with anoter coach schedule".$backwardTempTime. "and your posted duration ".$postedvalue['duration']." hours !! :(";
                 $durationFlag=false;


                  $messages['fromCityValue']=$postedvalue['fromCity'];
            
                  $messages['toCityValue']=$postedvalue['toCity'];
            
                  $messages['reportingTimeValue']=$postedvalue['reportingTime'];
                 $messages['departureTimeValue']=$postedvalue['departureTime'];
                 $messages['coachTypeValue']=$postedvalue['coachType'];
                 $messages['seatValue']=$postedvalue['seat'];
                 $messages['seatPriceValue']=$postedvalue['seatPrice'];
                 $messages['journeyDateValue']=$postedvalue['journeyDate'];
          
                 $messages['boardingPointsValue']=$postedvalue['checkbox'];
             
                 $messages['durationValue']=$postedvalue['duration'];
             }

                 

            $totalHours4=0;
            $totalMinutes4=0;
            $diff5=date_diff($forwardTempTime,$date6);       
            $difference3=$diff5->format("%R,%a,%H,%i");
            $difference3=explode(',', $difference3);
             
              //dd($difference);
    
            if($difference3[0]=='-'){
               $totalHours4= -($difference3[1]*24)-$difference3[2];
                //dd($totalHours);
               $totalMinutes4=($totalHours4*60)-$difference3[3];
             }elseif($difference3[0]=='+' ){
                   $totalHours4=($difference3[1]*24)+$difference3[2];
                    $totalMinutes4=($totalHours4*60)+$difference3[3];
               //dd($totalHours);
             }

             if($totalMinutes4<=($forwardTempTimeDuration*60)){



               $forwardTempTime= $forwardTempTime->format('Y-m-d H:i:s');
               $messages['errorValue']=" sry you cannot assign schedule for this coach!coach schedule is clash with another coach schedule $forwardTempTime and duration  $forwardTempTimeDuration hours  !! :(";
                 $durationFlag=false;
             
                    $messages['fromCityValue']=$postedvalue['fromCity'];
            
                  $messages['toCityValue']=$postedvalue['toCity'];
            
                  $messages['reportingTimeValue']=$postedvalue['reportingTime'];
                 $messages['departureTimeValue']=$postedvalue['departureTime'];
                 $messages['coachTypeValue']=$postedvalue['coachType'];
                 $messages['seatValue']=$postedvalue['seat'];
                 $messages['seatPriceValue']=$postedvalue['seatPrice'];
                 $messages['journeyDateValue']=$postedvalue['journeyDate'];
          
                 $messages['boardingPointsValue']=$postedvalue['checkbox'];
             
                 $messages['durationValue']=$postedvalue['duration'];


             }

             }///
             elseif($backwardTempTimeDiff==0 && $sameFlag && $firstCoachFlag){

              
            $totalHours4=0;
            $totalMinutes4=0;
            $diff5=date_diff($forwardTempTime,$date6);       
            $difference3=$diff5->format("%R,%a,%H,%i");
            $difference3=explode(',', $difference3);
             
              //dd($difference);
    
            if($difference3[0]=='-'){
               $totalHours4= -($difference3[1]*24)-$difference3[2];
                //dd($totalHours);
               $totalMinutes4=($totalHours4*60)-$difference3[3];
             }elseif($difference3[0]=='+' ){
                   $totalHours4=($difference3[1]*24)+$difference3[2];
                    $totalMinutes4=($totalHours4*60)+$difference3[3];
               //dd($totalHours);
             }

             if($totalMinutes4<=($forwardTempTimeDuration*60)){
              $forwardTempTime= $forwardTempTime->format('Y-m-d H:i:s');

               $messages['errorValue']=" sry you cannot assign schedule for this coach!coach schedule is clash with another coach schedule $forwardTempTime and duration $forwardTempTimeDuration hours   !! :(";
                 $durationFlag=false;
                   
                    $messages['fromCityValue']=$postedvalue['fromCity'];
            
                  $messages['toCityValue']=$postedvalue['toCity'];
            
                  $messages['reportingTimeValue']=$postedvalue['reportingTime'];
                 $messages['departureTimeValue']=$postedvalue['departureTime'];
                 $messages['coachTypeValue']=$postedvalue['coachType'];
                 $messages['seatValue']=$postedvalue['seat'];
                 $messages['seatPriceValue']=$postedvalue['seatPrice'];
                 $messages['journeyDateValue']=$postedvalue['journeyDate'];
          
                 $messages['boardingPointsValue']=$postedvalue['checkbox'];
             
                 $messages['durationValue']=$postedvalue['duration'];             


             }

              }
            

                 
            }
   
        //dd(!$flag2);
    if($postedvalue['fromCity']!=$postedvalue['toCity'] &&
            $totalMinutes>0 && $postedvalue['seat']>0
            && $postedvalue['seatPrice']>0 && $postedvalue['duration']>0
            &&$totalMins>=0 &&$durationFlag 
        ){
         $boards=implode(',', $postedvalue['checkbox']);
          
          $saveValue=[
              'coachId'=>$_SESSION['selectedCoachId'],

              'leavingPlace'=>$_POST['fromCity'],

              'goingPlace'=>$_POST['toCity'],

              'journeyDate'=>$_POST['journeyDate'],
              
              'reportingTime'=>$_POST['reportingTime'],

              'departureTime'=>$_POST['departureTime'],

              'coachType'=>$_POST['coachType'],

              'boardingPoints'=>$boards,

              'seats'=> $_POST['seat'],

              'seatPrice'=>$_POST['seatPrice'],

              'duration' =>$_POST['duration']

          ];

        //  dd($postedvalue);
          App::get('database')->insert('coachschedule',$saveValue);
          $messages['completeValue']='Congrasts! Coach Registered!';

         }

               

      return $messages;

      }

      //dd($postedvalue);

   }


   public function searchCoachSchedule($postedvalue){
    //dd($postedvalue);
    $messages=[
      'city'=>'',
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

       date_default_timezone_set('Asia/Dhaka');               
        //$currentDate=date("Y/m/d,H:i:s");
        $currentDate=date("Y/m/d");
        //$currentTime=date("H:i");
        //dd($currentTime);   
        
        $date=date_create($postedvalue['journeyDate']);
        $date2=date_create($currentDate);
        $diff=date_diff($date2,$date);
        //dd($diff);
        ///dd($diff->format("%R%d"));
        
        $diff=$diff->format("%R%d");



     $messages['city']=$this->cityObj->showAllCity();
      //dd($postedvalue);
      
      if($postedvalue['journeyDate']==""){
       
        $messages['journeyDate']='Journey date cannot be empty!';
        
        $messages['fromCityValue']=$postedvalue['fromCity'];
        $messages['toCityValue']=$postedvalue['toCity'];
        $messages ['coachType']=$postedvalue['coachType'];
        
      }
      else{
        
       if($diff<0 ){
             
          $messages['journeyDate']='Ooops You have selected wrong date!!Date Already Pass!';
      

        $messages['journeyDateValue']=$postedvalue['journeyDate'];
        
        $messages['fromCityValue']=$postedvalue['fromCity'];
        $messages['toCityValue']=$postedvalue['toCity'];
        $messages ['coachType']=$postedvalue['coachType'];
        }


      }

      if($postedvalue['fromCity']==$postedvalue['toCity']){

        $messages['toCity']='City name canot be same!';

        $messages['journeyDateValue']=$postedvalue['journeyDate'];
        
        $messages['fromCityValue']=$postedvalue['fromCity'];
        $messages['toCityValue']=$postedvalue['toCity'];
        $messages ['coachType']=$postedvalue['coachType'];

      }


     if($postedvalue['journeyDate']!="" && $diff >=0 && $postedvalue['fromCity']!=$postedvalue['toCity']){
          
                 $messages['flag']=true;
                 //dd('here');
       $postedForDatbase=[
        'leavingPlace'=>$postedvalue['fromCity'],
         'goingPlace' =>$postedvalue['toCity'],
         'journeyDate'=>$postedvalue['journeyDate'],
         'coachType'  => $postedvalue['coachType']

      ];
       $coachSchedule=App::get('database')->selectAllByFourDetail('coachschedule',
        'CoachSchedule',$postedForDatbase);

  
       date_default_timezone_set('Asia/Dhaka');               
       $currentDate2=date("Y/m/d,H:i");

       $dateCreate2=date_create($currentDate2);
       
       $totalHours=0;
       $totalMinutes=0;
       $i=0;

       foreach ($coachSchedule as $coach) {
          $dateCreate=date_create($coach->journeyDate.' '.$coach->reportingTime);
        //dd($dateCreate);
          $difference=date_diff($dateCreate2,$dateCreate);
          $difference=$difference->format("%R,%d,%H,%i");

            
             $difference=explode(',', $difference);
             
              //dd($difference);
    
            if($difference[0]=='-'){
               $totalHours= -($difference[1]*24)-$difference[2];
                //dd($totalHours);
               $totalMinutes=($totalHours*60)-$difference[3];
             }elseif($difference[0]=='+' ){
                   $totalHours=($difference[1]*24)+$difference[2];
                    $totalMinutes=($totalHours*60)+$difference[3];
               //dd($totalHours);
             }
             if($totalMinutes<0){
                //dd('here');
              unset($coachSchedule[$i]);
             }
           ++$i;

        }


        //dd($coachSchedule);

        $countCoachSchedule=count($coachSchedule);
        if($countCoachSchedule==0){
           $messages['emptyMessage']='sry no caoch schedule exist during this preiod!';
          //return view("show-seacrh-coaches",$showSearchCoaches);
        }else{

           
           $messages['searchCoaches']=$coachSchedule;
 
            //return view("show-seacrh-coaches",$showSearchCoaches);
        }


       //dd("here");
       //dd($coachSchedule);

     }
      //dd($messages);

      return $messages;
        

     
     
   } 
   

}

  