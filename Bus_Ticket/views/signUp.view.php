 
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
  width: 100%;
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
 .link2{
 background-color: #00BFFF ;
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

/* Extra styles for the cancel button */


/* Float cancel and signup buttons and add an equal width */
.link, .signupbtn {
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
  .link, .signupbtn {
     width: 100%;
  }
}
</style>
<body>
 
  <form method="POST" action ="/Bus_Ticket/postSignUp" style="border:1px solid #ccc">
        <div class="container">
     <h1>Sign Up</h1>
     
     <h2 style="color: purple"> <?php echo $messages['completeSignup'];?></h2>
     <?php
         if($messages['completeSignup']!=''):?>
         
         <h3 style="color: blue">You can now go to your account.link given below.</h3>
         <pre>             <a href="log-in" class="link2">Log In</a>   </pre>
         
         <?php endif; ?>
     <hr>
      <label for="fname"><b>First Name</b></label>
     <input type="text" name="firstName" placeholder="enter your first name" value=<?=$messages['firstNameValue'] ?> > </input><b style="color: red"><?= $messages['firstName'];?></b></br>
     
     <label for="lname"><b>Last Name</b></label> 
     <input type="text" name="lastName" placeholder="enter your last name" 
     value=<?=$messages['lastNameValue'] ?> > </input><b style="color: red"><?= $messages['lastName'];?></b></br>

     <label for="email"><b>Email</b></label>
     <input type="email" name="email" placeholder="enter your email"
     value=<?=$messages['emailValue'] ?> > </input></br><b style="color: red"><?= $messages['email'];?></b></br>
     
     <label for="pass"><b>Password</b></label>
     <input type="text" name="password" placeholder="enter your password"
     value=<?=$messages['passwordValue'] ?> > </input></br><b style="color: red"><?= $messages['password'];?></b></br>
     
     <label for="cpass"><b>Confirm Password</b></label>
     <input type="text" name="confirmPassword" placeholder="retype your password"value=<?=$messages['confirmPasswordValue'] ?> > </input></br><b style="color: red"><?= $messages['confirmPassword'];?></b></br>
     
     <label for="phone"><b>Phone Number</b></label>
     <input type="text" name="phone" placeholder="enter your phone number"
     value=<?=$messages['phoneValue'] ?> > </input></br><b style="color: red"><?= $messages['phone'];?></b></br>
      <div class="clearfix">
        <button type="submit" class="signupbtn">Sign Up</button>
         <a href="/Bus_Ticket/" class="link">Cancel</a> 
     
    </div>
     
     </div>
     </form>	
     
     </body>
</html>
