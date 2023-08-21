<?php

 namespace App\controllers;
  //use App\core\App;
 
 use App\model\CoachSchedule;
 use App\model\Ticket;
 use App\model\User;
 class TicketController{
   
 public function selectedCoach(){

     $ticket=new Ticket();
     $ticket->setCoachScheduleObj(new CoachSchedule());
     $messages=$ticket->showSeatLayout($_GET['id']);
     // dd($messages);
  
     return view("seat-layout",$messages);
   }

   public function postBooking(){

     //dd($_POST);
    $ticket=new Ticket();
    $ticket->setCoachScheduleObj(new CoachSchedule());
    $messages=$ticket->postBooking($_POST);
    if($messages['flag']){

      return view('seat-layout',$messages);

    }
    else{
     return redirect('check-out');

    }

    }

    public function checkOut(){


        session_start();
        User::isSessionExist($_SESSION['customerId']);
        $ticket=new Ticket();
        $ticket->setCoachScheduleObj(new CoachSchedule());
        $messages=$ticket->showCheckout();
      //dd("here!");  
      
        return view("check-out",$messages);  

       
      


    }

    public function confirmBooking(){
        session_start();
        User::isSessionExist($_SESSION['customerId']);
        $ticket=new Ticket();
        $ticket->setCoachScheduleObj(new CoachSchedule());

        $messages=$ticket->confirmCheckout($_SESSION['customerId']);
  
       return view('confim-check-out',$messages);


    }

    public function cancelBooking(){

      session_start();
      User::isSessionExist($_SESSION['customerId']);

      $ticket=new Ticket();
      $ticket->setCoachScheduleObj(new CoachSchedule());
      $messages=$ticket->cancelCheckOut();

    }


    

    public function showCustomerReservation(){

      session_start();
      User::isSessionExist($_SESSION['customerId']);

      $ticket=new Ticket();
      $ticket->setCoachScheduleObj(new CoachSchedule());

       $messages=$ticket->showCustomerReservation();
      return view('show-customer-reservation',$messages);
    }

  }
