
<!DOCTYPE html>
<html>
<head>
<style>
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

p.dotted {
  border-style: dotted;
  border-width: thick;
 border-color: #FF6347 #40E0D0 #1E90FF ;
}



table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 75%;
}

td, th {
  border: 1px dotted #FF6347;
  text-align: center;
  padding: 8px;

}

tr:nth-child(even) {
  background-color:#1E90FF ;
}



/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.link {
  background-color: #f44336;
  border: none;
  color: white;
  padding: 10px 0px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
 

button:hover {
  opacity:1;
}

link:hover {
  opacity:1;
}


/* Float cancel and signup buttons and add an equal width */
.link, .confirmbtn {
  float: left;
  width: 100%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .confirmbtn {
     width: 100%;
  }
}

</style>
</head>
<body>

<ul>
  <li><a href="/Bus_Ticket">Home</a></li>

    <li class="dropdown">
     <a href="javascript:void(0)" class="dropbtn">Account</a>
     <div class="dropdown-content">
      <a href="customer-profile"> My Profile</a>
      <a href="show-customer-reservation">My Resevation</a>
     </div>
    </li>
   <li><a href="#news">News</a></li>
   <li><a href="#contact">Contact</a></li>
 <div class="topnav-rightLogout">
   <li><a href="log-out">Log Out</a></li>
 </div> 
 </ul>


  
   <div style="padding-left:36% ">
    <h1 style="color:#20B2AA " >Reservation Details:</h1>
    </div>

<div style="padding-left:23%;text-align:center; width:50%">
   
  <p  class="dotted"style="color:#20B2AA " >Coach Information:</br>

    Coach:<?=$messages['coachObj'][0]->getCoachNo();?></br>
    Type:<?=$messages['coachScheduleObj']->getCoachType();?></br>
    Boarding:<?=$messages['checkedBoard'][0]->getBoardingPointName();?></br>
    
    </p>
   </br>

 
 <div style="padding-left:15%; width:70%">
   
  <p  class="dotted"style="color:#20B2AA " >Time Information:</br>

    Trip Date:<?=$messages["coachScheduleObj"]->getJourneyDate();?></br>
    Reporting:<?=$messages["coachScheduleObj"]->getReportingTime();?></br>

    Departure:<?=$messages["coachScheduleObj"]->getDepartureTime();?></br>

    
    </p>



</div>
 </br>

     <div style="padding-left:0% "> 
      <h2 style="color:#20B2AA " ><font size="5">Seat Details:</font></h2>
    </div>
    <div style="text-align:center; width:150%">
    
     <table>

     <tr>
      <th style="color:#20B2AA">#</th>
      <th style="color:#20B2AA">Seat</th>
      <th style="color:#20B2AA">From/To</th>
      <th style="color:#20B2AA">Fare</th>
     </tr>
   <?php 
   //dd($messages);
    $count=1;
    foreach ($messages["checkedSeatArr"] as $checkSeat) :?>
   <tr>
    <td style="color:#20B2AA"> <?=$count;?></td>
    <td style="color:#20B2AA"> <?=$checkSeat;?></td>
    <td style="color:#20B2AA"> <?=$messages["leavingPlaceObj"][0]->getCityName().'/'
       .$messages["goingPlaceObj"][0]->getCityName();?></td>
  
     <td style="color:#20B2AA"> <?=$messages['coachScheduleObj']->getSeatPrice();?></td>
  </tr>

 <?php ++$count;  

  endforeach?>
    <tr>
         <td></td>
         <td></td>
         <td style="color:#20B2AA">Total Amounts:</td>
         <td style="color:#20B2AA"><?=$messages['totalAmount']  ?>/=tk.</td>

    </tr>

   </table>

    </div>

       <div style="padding-left:0% "> 
      <h2 style="color:#20B2AA " ><font size="5">Payment Section:</font></h2>
      </div>
    
       <a href="">
      <img src="/Bus_Ticket/picture/bkash.png" alt="Bkash Image" style="width:50px;height:50px;border:solid #1E90FF;">
       <img src="/Bus_Ticket/picture/rocket.png" alt="Rocket Image" style="width:50px;height:50px;border:solid #1E90FF;">

      <img src="/Bus_Ticket/picture/paypal.jpg" alt="Paypal Image" style="width:50px;height:50px;border:solid #1E90FF;">
       </a>

       <form method="POST" action ="/Bus_Ticket/confirmBooking" >
        <div style="padding-left:5% ">
     

      <div class="clearfix">
        <button type="submit" class="confirmbtn">Confirm Booking</button>
         <a href="/Bus_Ticket/cancelBooking" class="link">Cancel Booking</a> 

      </div>
      </div>

    </form>
  
</body>
</html>


