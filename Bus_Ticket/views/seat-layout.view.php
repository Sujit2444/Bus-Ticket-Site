<!DOCTYPE html>
<html>
<head>
<style>
 
/*cancel button link type*/
  .link {
  float: left;
  width: 50%;
}
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
.link {
   width: 56%;
  background-color: #f44336;
  border: none;
  color: white;
  padding: 14px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
link:hover {
  opacity:1;
}


/* Page layout dropdown elements */
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color: aqua;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

 .dropdown:hover .dropdown-content {
  display: block;
 }

.topnav-rightLogout {
  float: right;
  background-color:red;
 }
.topnav-right{
  float: right;
  background-color: green;

}

/* input fields*/

.bodyborder{

  width :100%;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  }
input[type=text],input[type=date],input[type=time],select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 60%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
 }


/* custom check box*/
.hidden {position:absolute;visibility:hidden;opacity:0;}
input[type=checkbox] + label {
  color: black;
  width :3%;
  padding: 20px 20px;
  font-style: none;
  background-color:#1E90FF;
  text-align: center;
  display: inline-block; 
  
} 
input[type=checkbox]:checked + label {
  /*color: #f00;*/

  background-color:#00FA9A;
  font-style: normal;
}

.label{
  width :3%;
  padding: 20px 20px;
  font-style: none;
  text-align: center;
  display: inline-block;
  background-color:#FF4500;
}

/*custom radio button*/
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
  top: 9px;
  left: 9px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: white;
}

</style>
</head>
<body>
<ul>
  <li><a href="/Bus_Ticket">Home</a></li>
  
   
   <?php 
   session_start();
    if(isset($_SESSION['customerId']) != null):?>
  
   <li class="dropdown">
     <a href="javascript:void(0)" class="dropbtn">Account</a>
     <div class="dropdown-content">
      <a href="customer-profile"> My Profile</a>
    <a href="show-customer-reservation">My Resevation</a>
     </div>
   </li>
   <?php endif;?>


   <li><a href="#news">News</a></li>
   <li><a href="#contact">Contact</a></li>
    

    <?php
    
    if(isset($_SESSION['customerId'])!=null):?>
   <div class="topnav-rightLogout">
    <li><a href="log-out">Log Out</a></li>
   </div>
   <?php else:?>
   <div class="topnav-right">
    
   <li> <a href="sign-up">Sign Up</a></li>
    <li><a href="log-in">Log In</a></li>
   </div>
    <?php endif;?>
</ul>

  
   <div class="bodyborder">
  
  <div style="padding-left:20%">
   
   <h1><font size="6">Seat LayOut:</font></h1>
   <h2> please click on the seat for boooking...</h2>

  <?php

   
   // echo  $messages['coachScheduleObj'][0]->id;

    $reservedSeat=$messages['coachScheduleObj']->getReservedSeat();
    $reservedSeat=explode(',', $reservedSeat);

    //dd($reservedSeat);
    $seats= $messages['coachScheduleObj']->getSeats();
    $i=1;
    $j=1;
    $k=1;
    $m=0;
    $flag=false;

    
    ?>
    <form action="/Bus_Ticket/postBooking" method="post">
    <?php
    foreach(range('A','Z') as $letter) 
    { 
      
     
      for($j=1;$j<=4;++$j){
     
         if($i<= $seats){   
        foreach ($reservedSeat as $seat) {
         //dd($letter);      
        if($seat==($letter.$j)){
         
          $flag=true;
         }  
        
        }

        if($k==4){
          
        if($flag):?>

       <label class="label"> <?= $letter.$j;?> </label> </br></br>   

     <?php
        else:
      ?> 

      
      <input type="checkbox"  class="hidden" name="checkbox[]"  
      value=<?= $letter.$j;?> id=<?=$letter.$j; ?> >
       <label for=<?=$letter.$j; ?> > <?= $letter.$j;?> </label></br></br>
      
      
 
      <?php
    endif;
          $k=1;
          
         }
        else{
          if($m==2){
          
        if($flag):?>

     &emsp;<label class="label"><?= $letter.$j;?></label>    

     <?php
        else:

            ?>
    &emsp; <input type="checkbox" class="hidden"  name="checkbox[]" 
      value=<?= $letter.$j;?> id=<?=$letter.$j; ?> > 
    <label for=<?=$letter.$j; ?> > <?= $letter.$j;?></label>    
          
           <?php
           endif;
           $m=0;
          }
          else{
            if($flag):?>

        <label class="label"> <?= $letter.$j;?> </label>  

        <?php
         else:
            ?>
     
      <input type="checkbox"class="hidden"  name="checkbox[]" 
      value=<?= $letter.$j;?> id=<?=$letter.$j; ?> > 
      <label for= <?=$letter.$j; ?> > <?= $letter.$j;?></label>

             <?php
           endif;
             ++$m;
          }
          
          ++$k; 
        }
        
          $flag=false;
          ++$i;
      
        }
      }
    
    
   }
   ?>
  <h1 style="color: red" > <?=$messages['flagError'] ;?></h1>
  <h1>Select One Boarding Point:</h1>
 
  <?php

 //dd($messages["boardingPointsObj"]);
  foreach ($messages["boardingPointsObj"] as $board):?>
           
  <label class="container"><?= $board[0]->getBoardingPointName(); ?>
  <input type="radio" checked="checked" name="radio" value= <?=$board[0]->id; ?>>
  <span class="checkmark"></span>
 </label>
     <?php endforeach?>
     <div class="clearfix">

         <input type="submit" value="Submit">
    <a href="/Bus_Ticket/" class="link">Cancel</a> 
  

     </div>
   </form>

     </div>



    </div>


</body>
</html>
