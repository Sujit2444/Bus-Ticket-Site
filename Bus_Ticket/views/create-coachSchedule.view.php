
<!DOCTYPE html>
<html>
<head>
<style>


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
  width: 50%;
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

li a,.dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn  {
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




</style>
</head>
<body>

<ul>
<li><a href="admin-profile">My Profile</a></li>
<li class="dropdown">
     <a href="javascript:void(0)" class="dropbtn">Travel City</a>
     <div class="dropdown-content">
      <a href="add-city">Add City</a>
      <a href="edit-city">Edit City</a>
      <a href="remove-city">Remove City</a>
     </div>
    </li>

    <li class="dropdown">
     <a href="javascript:void(0)" class="dropbtn">Boarding Point</a>
     <div class="dropdown-content">
      <a href="add-board">Add Boarding Point</a>
      <a href="edit-board">Edit Boarding Point</a>
      <a href="remove-board">Remove Boarding Point </a>
     </div>
    </li>

    <li class="dropdown">
     <a href="javascript:void(0)" class="dropbtn">Coach</a>
     <div class="dropdown-content">
      <a href="add-coach">Add Coach</a>
      <a href="edit-coach">Edit Coach</a>
      <a href="remove-coach">Remove Coach</a>
     </div>
    </li>

    <li class="dropdown">
     <a href="javascript:void(0)" class="dropbtn">Coach Schedule</a>
     <div class="dropdown-content">
     <a href="get-coachSchedule">Create Coach Schedule</a>
     <a href="getAll-coachSchedule">Show Coach Schedule</a>
     </div>
    </li>



 <div class="topnav-rightLogout">
   <li><a href="log-out">Log Out</a></li>
 </div> 
 </ul>
  
<div class="bodyborder">
  
  <div style="padding-left:20%">
   <h2><font size="6">Create Coach Schedule:</font></h2>

  <h1 style="color: green"><strong> <?=$messages['completeValue']?></strong></h1>
   <h1 style="color: red"><strong> <?=$messages['errorValue']?></strong></h1>
  <form method="POST" action="/Bus_Ticket/saveCoachSchedule">
    
    <h3>Coach Number:</h3>
   <p><strong><?= $messages['coach'][0]->getCoachNo();?></strong></p>



   <h3> From: </h3>
  
   <select name="fromCity">
    <?php  
     $flag=true;
    foreach($messages['city'] as $message):?>
      <?php if($messages['fromCityValue']==$message->id) :?>
      <option value="<?=$message->id ;?>" selected><?=$message->getcityName();?> </option>             
      <?php 
        $flag=false;
       endif;
     
       if($flag):
       ?>
       

      <option value="<?=$message->id ;?>"><?=$message->getcityName();?></option>
     <?php 
       endif;
       $flag=true;
      endforeach; ?>
 
    </select>   

 
 
 <h3> To: </h3>
  
   <select name="toCity">
  	<?php  foreach($messages['city'] as $message):?>
     $flag=true;
     <?php if($messages['toCityValue']==$message->id) :?>
      <option value="<?=$message->id ;?>" selected><?=$message->getcityName();?> </option>             
     <?php 
       $flag =false;
      endif;

       if($flag) : ?>
     
      <option value="<?=$message->id ;?>"><?=$message->getcityName();?></option>
   <?php 
    endif;
    $flag=true;
    endforeach; ?>
 
  </select>

   <h1 style="color: red"><strong> <?=$messages['toCity']?></strong></h1>   


  <h3>Select Date: </h3>  
  <input type="date" name="journeyDate" value=<?=$messages['journeyDateValue']?> >
    <h1 style="color: red"><strong> <?=$messages['journeyDate']?></strong></h1>
   

   <h3>Reporting Time: </h3>
  <input type="time" name="reportingTime"value=<?= $messages['reportingTimeValue'] ?>>
   <h1 style="color: red"><strong> <?=$messages['reportingTime']?></strong></h1>
   


   <h3>Departure Time: </h3>
   

  <input type="time" name="departureTime" value=<?=$messages['departureTimeValue']?>>  
   <h1 style="color: red"><strong> <?=$messages['departureTime']?></strong></h1>

    <h3>Coach Type: </h3>
   
   <select name="coachType">
  	
    <option value="Ac">Ac</option>
  
    <option value="Non-Ac">Non-Ac</option>
    </select> 


   <h3>Check Boarding Points:</h3>
   	<?php 
  
        if($messages['boardingPointsValue']!=''){
        $flag=true;
        foreach($messages['board'] as $message){
        foreach($messages['boardingPointsValue'] as $value){
        
        if($value == $message->id ):?>
        <input type="checkbox" name="checkbox[]" value=<?=$message->id; ?> checked > 
       <?= $message->getBoardingPointName();?> </br>
          
       <?php
         $flag=false;
         break;  
         endif;
              
         
              }
            if($flag) :?>
            <input type="checkbox" name="checkbox[]" value=<?=$message->id; ?> > 
        <?= $message->getBoardingPointName();?> </br>
        
        <?php 
         
         endif; 
         $flag=true;
       }

     }else{
      //echo 'okk';

     foreach($messages['board'] as $message):?>
      
     <input type="checkbox" name="checkbox[]" value=<?=$message->id; ?> > 
     <?= $message->getBoardingPointName();?> </br>
     <?php endforeach;
     }?>


   <h1 style="color: red"><strong> <?=$messages['boardingPoints']?></strong></h1>

   <h3>Number Of Seats:</h3>
    <input type="text" name="seat" placeholder="Enter Seat Number" value=<?=$messages['seatValue']?> >
   <h1 style="color: red"><strong> <?=$messages['seat']?></strong></h1>

    <h3>Seat Price:</h3>

   <input type="text" name="seatPrice" placeholder="Enter Seat Price"value= <?=$messages['seatPriceValue']?>>
    <h1 style="color: red"><strong> <?=$messages['seatPrice']?></strong></h1>
    

    <h3>Coach Scedule Duration:</h3>
   <input type="text" name="duration" placeholder="Enter Duration In Hours " value=<?=$messages['durationValue']?>>
   <h1 style="color: red"><strong> <?=$messages['duration']?></strong></h1>
    
    
    <input type="submit" value="Save">
  </form>
  
  
  </div>
      
</div>
  
   
 </div> 



</body>
</html>