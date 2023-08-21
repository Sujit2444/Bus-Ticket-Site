<!DOCTYPE html>
<html>
<head>
<style>
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

/*anchor tag*/
.link2{

  background-color:DeepSkyBlue;
  color: black;
  padding: 60px 350px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color:aqua;
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
   

      <h1 style="color: red" > <?=$messages['emptyMessage'] ;?></h1>
     <?php if($messages['searchCoaches']!=""){ 
     ?> <h2><font size="6">Select One Coach Schedule:</font></h2>
     <?php
      foreach($messages['searchCoaches'] as $coach):?>
    
     <a href="/Bus_Ticket/selectedCoach?id=<?=$coach->id; ?>" class="link2">Coach No:<?=
     $coach->getCoachName()[0]->getCoachNo().'<br>';?>
         Date: <?= $coach->getJourneyDate().'<br>';?>
         Reporting-Time:<?= $coach->getReportingTime().'<br>';?>
        Departure-Time:<?= $coach->getDepartureTime().'<br>';?>
         Coach Type:<?= $coach->getCoachType().'<br>';?>
         Seat Fare:<?= $coach->getSeatPrice()."tk".'<br>';?>
      </a> </br></br></br>


   <?php endforeach;
     }
     ?>





    
  
  
     </div>

    </div>


</body>
</html>
