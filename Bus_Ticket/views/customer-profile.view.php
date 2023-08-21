
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

  <div style="padding-left:40%">
   <h2><font size="6">Profile:</h2>
  
   <p style="color:DeepSkyBlue;"><font size="6">Welcome!<?=$messages[0]->getFirstName() .' '. $messages[0]->getLastName(); ?><span>&#128591;</span></br>
    
    Email Id: <?=$messages[0]->getEmail();?></br>
    
    Phone Number:<?=$messages[0]->getPhone();?></br>
   </p>
 
</div>

</body>
</html>


