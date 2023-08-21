<?php

 namespace App\model;
 use App\core\App;
 class User{

 private $firstName;
 private $lastName;
 private $email;
 private $password;
 private $phone;
 private $userType;

 public function getFirstName(){

 	return $this->firstName;
 }

 public function getLastName(){

 	return $this->lastName;
 }

 public function getEmail(){

 	return $this->email;
 }

 public function getPassword(){

 	return $this->password;
 }

 public function getPhone(){

 	return $this->phone;
 }
 
 public function getUserType(){

 	return $this->userType;
 }

 public function saveUserDetail($postValues){

     $message=$this->userDetailValidation($postValues);
     
     if(!$message['flag']){

      return $message;	
     }else{
        
        

     $modifiedPostValues=array_filter($postValues,function($postvalue){

     
       return $postvalue!='confirmPassword';
     
     },ARRAY_FILTER_USE_KEY);
      
        App::get('database')->insert('user',$modifiedPostValues);
        $message['completeSignup']="Congrasts!u have successfully registered!";
        return $message;
       }
 }  
     


 private function userDetailValidation($postValues){

     $message=[
       'firstName'=>'',
       'lastName' =>'',
       'email'=>'',
       'password'=>'',
       'confirmPassword'=>'',
       'phone'=>'',
       'flag'=>false,
       'firstNameValue'=>'',
       'lastNameValue' =>'',
       'emailValue'=>'',
       'passwordValue'=>'',
       'confirmPasswordValue'=>'',
       'phoneValue'=>'',
       'completeSignup'=>''
     ];
     if($postValues['firstName']==''||$postValues['lastName']==''||
       $postValues['email']==''||$postValues['password']==''||
       $postValues['confirmPassword']==''||$postValues['phone']==''){

       if($postValues['firstName']==''){
       
       $message['lastNameValue'] =$postValues['lastName'];
       $message['emailValue']=$postValues['email'];
       $message['passwordValue']=$postValues['password'];
       $message['confirmPasswordValue']=$postValues['confirmPassword'];
       $message['phoneValue']=$postValues['phone'];
     
 

       $message['firstName']='first name cannot be empty!'; 

       }

       if($postValues['lastName']==''){
        
       $message['firstNameValue'] =$postValues['firstName'];
       $message['emailValue']=$postValues['email'];
       $message['passwordValue']=$postValues['password'];
       $message['confirmPasswordValue']=$postValues['confirmPassword'];
       $message['phoneValue']=$postValues['phone'];

       $message['lastName']='last name cannot be empty!'; 

       }

       if($postValues['email']==''){
       $message['firstNameValue'] =$postValues['firstName'];
       $message['lastNameValue'] =$postValues['lastName'];
       $message['passwordValue']=$postValues['password'];
       $message['confirmPasswordValue']=$postValues['confirmPassword'];
       $message['phoneValue']=$postValues['phone'];

       $message['email']='email field cannot be empty!'; 

       }

       if($postValues['password']==''){
       $message['firstNameValue'] =$postValues['firstName'];
       $message['lastNameValue'] =$postValues['lastName'];
       $message['emailValue']=$postValues['email'];
       //$message['confirmPasswordValue']=$postValues['confirmPassword'];
       $message['phoneValue']=$postValues['phone'];

       $message['password']='password field cannot be empty!'; 

       }

       if($postValues['confirmPassword']==''){
       $message['firstNameValue'] =$postValues['firstName'];
       $message['lastNameValue'] =$postValues['lastName'];
       //$message['passwordValue']=$postValues['password'];
       $message['emailValue']=$postValues['email'];
       $message['phoneValue']=$postValues['phone'];

       $message['confirmPassword']='confirm password field cannot be empty!'; 

       }

       if($postValues['phone']==''){
       $message['firstNameValue'] =$postValues['firstName'];
       $message['lastNameValue'] =$postValues['lastName'];
       $message['passwordValue']=$postValues['password'];
       $message['confirmPasswordValue']=$postValues['confirmPassword'];
       $message['emailValue']=$postValues['email'];

       $message['phone']='phone cannot be empty!'; 

       }
        
        
        return $message;
     }else{
                 
                 if(strlen($postValues['password'])<=10){
                     
                     $message['firstNameValue'] =$postValues['firstName'];
                     $message['lastNameValue'] =$postValues['lastName'];
                     $message['emailValue']=$postValues['email'];
                     $message['phoneValue']=$postValues['phone'];
                     
                     $message['password']='password is too short! length must be greater than 9 digit ';  
                 }

                 if(strlen($postValues['phone'])!=11){
                     
                     $message['firstNameValue'] =$postValues['firstName'];
                     $message['lastNameValue'] =$postValues['lastName'];
                     $message['emailValue']=$postValues['email'];
                     $message['passwordValue']=$postValues['password']; 
                     $message['confirmPasswordValue']=$postValues['confirmPassword']; 

                     $message['phone']='invalid phone number!';
                 
                 }


                 if(!filter_var($postValues['email'],FILTER_VALIDATE_EMAIL)){
                    
                           $message['firstNameValue'] =$postValues['firstName'];
                           $message['lastNameValue'] =$postValues['lastName'];
                           $message['passwordValue']=$postValues['password'];
                           $message['confirmPasswordValue']=$postValues['confirmPassword'];
                           $message['phoneValue']=$postValues['phone'];
                           
                           $message['email']='invalid email!';

                  }

                  if($postValues['password']!= $postValues['confirmPassword']){
                  	 
                            $message['firstNameValue'] =$postValues['firstName'];
                            $message['lastNameValue'] =$postValues['lastName'];
                            $message['emailValue']=$postValues['email'];
                            $message['phoneValue']=$postValues['phone'];
                            $message['passwordValue']=$postValues['password'];

                  	       $message['confirmPassword']='confirm password donot match with password!'; 
                    }


                  
                      $allUsers=App::get('database')->selectAll('user','User');
       
                      //dd($allUsers);
                      $existEmail='';
                      foreach ($allUsers as $user) {
        	
        	             if($user->email==$postValues['email']){
        		           $existEmail=$user->email;
        	              
        	               $message['firstNameValue'] =$postValues['firstName'];
                           $message['lastNameValue'] =$postValues['lastName'];
                           $message['passwordValue']=$postValues['password'];
                           $message['confirmPasswordValue']=$postValues['confirmPassword'];
                           $message['phoneValue']=$postValues['phone'];
                           
                           $message['email']='email already exist!';

                             break;
        	              }
                       }


                     if(!(strlen($postValues['password'])<=10) && strlen($postValues['phone'])==11 &&   filter_var($postValues['email'],FILTER_VALIDATE_EMAIL)&& $postValues['password']==$postValues['confirmPassword']&&$existEmail=='' ){
                        
                         

                       $message['flag']=true;
                       
                       }

                 return $message;
        
        }


   }


   public function checkLoginDetail($postValues){
        //dd($postValues);

       $messages=[
         'messageIncorrect' =>'',
         'messageEmail'=>'',
         'messagePassword'=>''

       ];

       if($postValues['email']==''||$postValues['password']==''){
        
        if($postValues['email']==''){

          $messages['messageEmail']='email field is empty!';
        }
        if($postValues['password']==''){

          $messages['messagePassword']='password field is empty!';
        }

        return  view('login',$messages);

       }
        else{
       $checkUser=App::get('database')->selectAllByTwoDetail('user','User',$postValues);
        //dd($checkUser);
        
       if(empty($checkUser)){
        $messages['messageIncorrect']='Ooops!Incorrect Information!';

         return  view('login',$messages);       

       }else{
       
       session_start();
       
       if($checkUser[0]->userType == 'customer'){
         if(isset($_COOKIE["checkedSeat"]) &&isset($_COOKIE["checkedBoard"])){

             $_SESSION['customerId']=$checkUser[0]->id;

                return   redirect('check-out');
         }else{
      
         $_SESSION['customerId']=$checkUser[0]->id; 
        
         return   redirect('');
         }
       }
        $_SESSION['adminId']=$checkUser[0]->id;
        return  redirect('admin-profile');
       }
       
      }
   }


   public static function isSessionExist($id){

    
    if(! isset($id)){

            
        return  redirect('log-in');  

      }

     }


    public function getUserDeatailById($userId){
             
           return App::get('database')->selectAllById('user','User',$userId);
  
       }

  public static function logOut(){
     session_start();

      if (isset($_SESSION['customeId'])) {
           $_SESSION['customerId']=null;
     }
     
     if (isset($_SESSION['adminId'])) {
           $_SESSION['adminId']=null;
     }
     session_destroy();
       
       }
 /*public function setUserDetail();
public function getUserDetail();
public function getUserDeatailById($userId);
public function saveUserDetail();

public function matchLogInInformation($data=[]);//match information with database information
 
public function modifyDetailsOfAUser($data=[]);//pass user modify details to a function and save it to database 


public function modifyPasswordOfAUser($data);//pass modify password to a function and save it to database

public function isSessionEXist(){

   if(isset($_SESSION['user_id'])){
      return ture;
   }

   return false;

 }*/

}



