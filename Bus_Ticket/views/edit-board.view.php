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
   <h2><font size="6">Select One Boarding Point :</font></h2>
   <form method="POST" action="/Bus_Ticket/postSelectedBoard">
  <?php foreach ($messages as $message):?> 
 <label class="container"><?= $message->getBoardingPointName(); ?>
  <input type="radio" checked="checked" name="radio" value= <?=$message->id; ?>>
  <span class="checkmark"></span>
 </label>
 <?php endforeach;?>

 <input type="submit" value="go">
</form>
</div>
 
</div>
 </body>

</html>