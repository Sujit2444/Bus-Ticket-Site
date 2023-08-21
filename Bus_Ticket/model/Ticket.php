<?php
 
 namespace App\model;
 use App\core\App;
 use App\model\City;
 use App\model\Coach;
 use App\model\BoardingPoint;
 class Ticket
 {
 private $userId;
 private $coachScheduleId;
 private $selectedSeats;
 private $selectedBoardingPoints;
 private $fare;
 private $coachScheduleObj;
 private $userObj;

 public function setUserId($userId){
   $this->userId=$userId;

 } 
	
 public function getUserId(){
  return $this->userId;

 }

 public function setCoachScheduleId($coachScheduleId){
  $this->coachScheduleId=$coachScheduleId;

 } 

 public function getCoachScheduleId(){
  return $this->coachScheduleId;

 }

 public function setSelectedSeats($selectedSeats){

  $this->selectedSeats=$selectedSeats;
 } 

 public function getSelectedSeats(){

  return $this->selectedSeats;
 } 	
 
 public function setSelectedBoardingPoints($selectedBoardingPoints){

  $this->selectedBoardingPoints=$selectedBoardingPoints;

 }

 public function getSelectedBoardingPoints(){

  return $this->selectedBoardingPoints;

 }

 public function setFare($fare){

   $this->fare=$fare;
 }

 public function getFare(){

   return  $this->fare;
 } 
 
 public function setCoachScheduleObj($coachScheduleObj){
  $this->coachScheduleObj=$coachScheduleObj;
 
 }

 public function getCoachScheduleObj(){
  return $this->coachScheduleObj;
 
 }

 public function setUserObj($obj){
   $this->userObj=$obj;

 }
  
  public function getUserObj(){
    return $this->userObj;

  } 
 public function showSeatLayout($getId){
  
    $messages=$this->setLayOut($getId);

       
      //dd($messages['coachScheduleObj'][0]->id);
       $cookie_name = "coachScheduleId";
       $cookie_value = $messages['coachScheduleObj']->id;
       setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
       

       /*$cookie_name2 = "getId";
       $cookie_value2 = $getId;
       setcookie($cookie_name2, $cookie_value2, time() + (86400 * 30), "/");
        */
      //dd($_COOKIE[$cookie_name2]);
       //dd($_COOKIE[$cookie_name]);
      //dd($messages);
     return $messages;


  }

  private function setLayOut($getId){

   

   $messages=[
             'flag'=>false,
             'flagError'=>'',
             'coachScheduleObj'=>'',
             'coachObj'=>'',
             'leavingPlaceObj'=>'',
             'goingPlaceObj'=>'',
             'boardingPointsObj'=>'',
             'checkedBoard'=>'',
             'checkedSeat'=>'',
             'checkedSeatArr'=>'',
             'totalAmount'=>''
   ];
 //dd($getId);

  $coachScheduleById= $this->coachScheduleObj->
                  showCoachScheduleById($getId);


  $coachScheduleById[0]->setCoachObj(new Coach());
  $coachScheduleById[0]->setCityObj(new City());
  $coachScheduleById[0]->setBoardObj(new BoardingPoint());

  $messages['coachScheduleObj']=$coachScheduleById[0];


//dd($coachScheduleById);

  //dd($coachScheduleById[0]->getCoachId());
  $coachById=$coachScheduleById[0]->getCoachObj()->showCoachById(
    $coachScheduleById[0]->getCoachId());
  $messages['coachObj']=$coachById;

  //dd($coachById);


 $leavingPlaceObj=$coachScheduleById[0]->getCityObj()->showCityById(
    $coachScheduleById[0]->getLeavingPlace()); //dd($coachById);
  //dd($leavingPlaceObj); 
   $messages['leavingPlaceObj']=$leavingPlaceObj;

  $goingPlaceObj=$coachScheduleById[0]->getCityObj()->showCityById(
    $coachScheduleById[0]->getGoingPlace());
  // dd($goingPlaceObj);

  $messages['goingPlaceObj']= $goingPlaceObj;

      //dd($coachScheduleById[0]);
      //dd($coachScheduleById[0]->boardingPointObj);  
  $boardingPointsObj=$coachScheduleById[0]->getBoardingPoint();

   //dd($boardingPointsObj);

   $messages['boardingPointsObj']=$boardingPointsObj;

  return $messages;

  }

  public function postBooking($postedValue){
          
         $messages; 

        // dd($_COOKIE['getId']);
    if(isset($_COOKIE["coachScheduleId"])){
            $messages=$this->setLayOut($_COOKIE["coachScheduleId"]);            
              
          }

    if(isset($postedValue['checkbox'])){
           
           //dd($_POST);
       $cookie_name = "checkedSeat";
       $cookie_value = implode(',', $_POST['checkbox']);
       setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
        //dd($_COOKIE[$cookie_name]);

        //dd($_POST['radio']);
       $cookie_name2 = "checkedBoard";
       $cookie_value2 = $_POST['radio'];
       setcookie($cookie_name2, $cookie_value2, time() + (86400 * 30), "/");

        //dd($_COOKIE[$cookie_name2]);
        }
        else{
           $messages['flag']=true;
      $messages['flagError']="U must have to sleect at least one seat to proceed!";
        }
           

        
       //dd($messages);
  
     return $messages;
  }

  public function showCheckout(){

       $messages;
       $checkedSeat;
       $checkedBoard;
       $checkedSeatArr;
   

      

       if(isset($_COOKIE["coachScheduleId"])){
          // dd($_COOKIE["coachScheduleId"]);
            $messages=$this->setLayOut($_COOKIE["coachScheduleId"]);            
              
          }
      //  dd($messages);


      if(isset($_COOKIE["checkedSeat"])){
          // dd($_COOKIE["coachScheduleId"]);
            $checkedSeat=$_COOKIE["checkedSeat"];

            $messages['checkedSeat']=$checkedSeat;           
              
          }

      if(isset($_COOKIE["checkedBoard"])){
          // dd($_COOKIE["coachScheduleId"]);
            $checkedBoard=$_COOKIE["checkedBoard"];

            //$messages['checkedBoard']=$checkedBoard;            
              
          }

          $messages['checkedBoard']= $messages['coachScheduleObj']->getBoardObj()->showBoardingPointById($checkedBoard);

          //dd($messages['checkedBoard']);



          //dd($messages['checkedSeat']);

        // dd($messages['coachScheduleObj']->getSeatPrice());

          $checkedSeatArr=explode(',', $checkedSeat);
           
          $messages['checkedSeatArr']=$checkedSeatArr;

          $count=count($checkedSeatArr);


          $messages['totalAmount']=($messages['coachScheduleObj']->getSeatPrice())*$count;

             $cookie_name = "amount";
             $cookie_value =$messages['totalAmount'];
          setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
          //dd($messages);

          return $messages;

   }


   public function confirmCheckout($id){
     $postedDatabase=[
      'userId'=>'',
      'coachScheduleId'=>'',
      'selectedSeats'=>'',
      'selectedBoardingPoints'=>'',
      'fare'=>''

     ];
      $coachScheduleId;
      $checkedSeat;
     
        if(isset($_COOKIE["coachScheduleId"])){
          // dd($_COOKIE["coachScheduleId"]);
            $postedDatabase['coachScheduleId']=$_COOKIE["coachScheduleId"];            
              
          }

           if(isset($_COOKIE["checkedSeat"])){
            $postedDatabase['selectedSeats']=$_COOKIE["checkedSeat"];           
              
            }

      if(isset($_COOKIE["checkedBoard"])){
            $postedDatabase['selectedBoardingPoints']=$_COOKIE["checkedBoard"];          
              
          }


     if(isset($_COOKIE["checkedBoard"])){
            $postedDatabase['fare']=$_COOKIE["amount"];          
              
          }

         $postedDatabase['userId']=$id;

          //dd($postedDatabase);          
      $arr=[
        'reservedSeat'=>'',
         'id'=>$postedDatabase['coachScheduleId']
       ];
 
     $coachSchedule= App::get('database')->selectAllById('coachschedule',
      'CoachSchedule', $postedDatabase['coachScheduleId']);
     
      //dd($coachSchedule);
    
      $reservedSeat=$coachSchedule[0]->getReservedSeat();
      
      $reservedSeat=$reservedSeat.','.$postedDatabase['selectedSeats'];
      //dd($reservedSeat);

        //dd($reservedSeat);
       $arr['reservedSeat']=$reservedSeat;
      App::get('database')->updateOneDetail('coachschedule',$arr);

      
     App::get('database')->insert('ticket',$postedDatabase);
        $messages['flagComplete']="Congrasts!Ticket Confirmed!";
  
     
     $this->unsetAllCookie();

     //dd($_COOKIE["amount"]);
     return $messages;

   }

   private function unsetAllCookie(){

     unset($_COOKIE['coachScheduleId']); 
     setcookie('coachScheduleId', null, -1, '/'); 



     unset($_COOKIE['checkedSeat']); 
     setcookie('checkedSeat', null, -1, '/'); 

     unset($_COOKIE['checkedBoard']); 
     setcookie('checkedBoard', null, -1, '/'); 
     
     unset($_COOKIE['amount']); 
     setcookie('amount', null, -1, '/'); 
      
   }

   public function cancelCheckOut(){

     $this->unsetAllCookie();

     return redirect("");

   }


   public function userDetailsForSelectedSeat($seat){

     $coachScheduleId= $_SESSION['coachScheduleId'];

     $getValues=[
      'coachScheduleId'=>$_SESSION['coachScheduleId']
      ];

      $tickets=App::get('database')->selectAllByOneDetail('ticket','Ticket',$getValues);

      $userid;
      foreach ($tickets as $ticket){
        
          $selectedSeats=$ticket->selectedSeats;
          
          if(strpos($selectedSeats, $seat)!== false){
              $userid=$ticket->userId;

            }  
      
      }

         $_SESSION['coachScheduleId']=null;
     return $this->userObj->getUserDeatailById($userid);
   
     
   }

 public function showCustomerReservation(){
     $values=[
       'userId'=>$_SESSION['customerId']
     ];
      $messages=[];
      $arr=[];

     $tickets=App::get('database')->selectAllByOneDetail('ticket','Ticket',$values);

      //setLayOut
      foreach ($tickets as $ticket) {

           
           $ticket->setCoachScheduleObj(new CoachSchedule);
           
          $messages=$ticket->setLayOut($ticket->coachScheduleId);
           $messages['ticketObj']=$ticket;
            array_push($arr,$messages);  
      }


      //dd($arr);

      return $arr;
  }


 

 }




?>