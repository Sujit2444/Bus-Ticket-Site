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
input[type=text], select {
  width: 100%;
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


/*anchor tag*/
.link2{
  width :3%;
  background-color:DeepSkyBlue;
  color: black;
  padding: 20px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}


a:hover, a:active {
  background-color:aqua;
}
/*label field*/
.label{
  width :3%;
  padding: 20px 20px;
  font-style: none;
  text-align: center;
  display: inline-block;
  background-color:#FF4500;
}

/*table*/
 
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 75%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;

}

tr:nth-child(even) {
  background-color: #dddddd;
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


     
   <h2><font size="6">Seat Chart:</font></h2>
   <?php 
   // echo $messages->getSeats();

    $reservedSeat=$messages->getReservedSeat();
    //dd($reservedSeat);
    $reservedSeat=explode(',', $reservedSeat);
    $seats=$messages->getSeats();

    //dd($seats);
    $i=1;
    $j=1;
    $k=1;
    $m=0;
    $flag=false;


     foreach(range('A','Z') as $letter) 
    { 
      
      
      for($j=1;$j<=4;++$j){
      
        if($i<=$seats){  
        foreach ($reservedSeat as $seat) {
         //dd($letter);      
        if($seat==($letter.$j)){
         
          $flag=true;
         }  
        
        }

        if($k==4){
          
        if($flag):?>
         
          <a href="/Bus_Ticket/selectedSeat?seat=<?=$letter.$j; ?>" class="link2"><?= $letter.$j;?>
          </a> </br></br>


     <?php
        else:
      ?> 
       <label class="label"> <?= $letter.$j;?> </label> </br></br>
      
      
 
      <?php
    endif;
          $k=1;
          
         }
        else{
          if($m==2){
          
        if($flag):?>

       &emsp;<a href="/Bus_Ticket/selectedSeat?seat=<?=$letter.$j; ?>" class="link2"><?= $letter.$j;?>
          </a> 

   

     <?php
        else:

            ?>
         &emsp;<label class="label"><?= $letter.$j;?></label>        
          
           <?php
           endif;
           $m=0;
          }
          else{
            if($flag):?>

          <a href="/Bus_Ticket/selectedSeat?seat=<?=$letter.$j; ?>" class="link2"><?= $letter.$j;?>
             </a>     

        <?php
         else:
            ?>
     
      <label class="label"> <?= $letter.$j;?> </label>
   

             <?php
           endif;
             ++$m;
          }
          
          ++$k; 
        }
        
          $flag=false;
          //echo $i;
          ++$i;
     
         }
      }
    
    
   }

  ?>

  <h2><font size="6">Coach Schedule Details:</font></h2>

   <table>
  <tr>
    <th>Coach No:</th>
    <th>From/To:</th>
    <th>Journey Date:</th>
    <th>Reporting Time:</th>
    <th>Departure Time:</th>
    <th>Coach Type:</th>
    <th>Boarding Points:</th>
    <th>Total Seats:</th>
    <th>Seat Price:</th>
    <th>Coach Duration:</th>
  </tr>

   <tr>
    <td> <?=$messages->getCoachObj()->getCoachObj()[0]->getCoachNo();?></td>
   
  
  
    <td> <?=$messages->getCityObj()->getCitiesObj()[0][0]->getCityName() 
              .'/'.$messages->getCityObj()->getCitiesObj()[1][0]->getCityName();
      ?>
    </td>
   

   
    <td> <?=$messages->getJourneyDate();?></td>
   


   
    <td> <?=$messages->getReportingTime();?></td>
   

   
    <td> <?=$messages->getDepartureTime();?></td>



    <td> <?=$messages->getCoachType();?></td>
   


   
    <td>
     <?php
     $str='';
     foreach ($messages->getBoardObj()->getBoardingPointsObj() as $board ) {
       $str=$str.','.$board[0]->getBoardingPointName();
       //$str=$str
     }

     echo $str;  
      ?>
     </td>
   

   <td> <?=$messages->getSeats();?></td>
   

    <td> <?=$messages->getSeatPrice();?>/=tk</td>

   
    <td> <?=$messages->getDuration();?>hours </td>
   </tr>
   </table>


   


 </div>
 
</div>
 </body>

</html>