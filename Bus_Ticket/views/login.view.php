<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password],input[type=email] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 0px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

input[type=email]:focus {
  background-color: #ddd;
  outline: none;
}
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
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
  padding: 10px 5px;
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
.link, .loginbtn {
  float: left;
  width: 50%;
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
  .cancelbtn, .loginbtn {
     width: 100%;
  }
}
</style>
<body>

 
 <form method="POST" action ="/Bus_Ticket/postLogin" style="border:1px solid #ccc">
 
  <div class="container">
     <h1>Log In</h1>
     <h2 style="color: purple"> <?php
     if($messages['messageIncorrect'] != ''){
     echo $messages['messageIncorrect']?><span style='font-size:100px;'>&#128556;</span><?php }?></h2>  
     <hr>
      <label for="email"><b> Email</b></label>
  <input type="text" name="email" placeholder="enter your email">
  </input><b style="color: red"> <?=$messages['messageEmail'] ?></b> </br>

  <label for="pass"><b>Password</b></label>
  <input type="password" name="password" placeholder="enter your password"> </input>
  <b style="color: red"><?=$messages['messagePassword'] ?></b> </br>
        <div class="clearfix">
        <button type="submit" class="loginbtn">Login</button>
         <a href="/Bus_Ticket/" class="link">Cancel</a> 
     
        </div>
    </div>
  </form>


</body>

</html>