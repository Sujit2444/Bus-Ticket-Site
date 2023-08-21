<?php
  namespace App\controllers;
  use App\core\App;
  use App\model\User;
 class UserController{
 
 /*public function getAllUser(){
     
     
     $users=App::get('database')->selectAll('user','User');
     return view('showuser',compact('users'),[]);

 }*/

   public function signUp(){
    
       $messages=[
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
    return view('signUp',$messages);

   }

 public function postSignUp(){
    
       
       $user=new User();
        $messages= $user->saveUserDetail([
          'firstName'=>ucwords($_POST['firstName']),
          'lastName' => ucwords($_POST['lastName']),
          'email'    => $_POST['email'],
          'password' => $_POST['password'],
          'confirmPassword' => $_POST['confirmPassword'],
          'phone'    => $_POST['phone'],
          'userType' => 'customer'
          ]);
      
       return view('signUp',$messages);

  }

  public function login(){
    $messages=[
         'messageIncorrect' =>'',
         'messageEmail'=>'',
         'messagePassword'=>''

       ];

    return view('login',$messages);

  }

  public function  postLogin(){


       
       $userDetailArr=(new User())->checkLoginDetail(
         ['email'=>$_POST['email'],

         'password'=>$_POST['password']]);  
        
        //var_dump($userDetailArr);

  }

   public function customerProfile(){
    
       session_start();

       User::isSessionExist($_SESSION['customerId']);
       $userInformations= (new User)->getUserDeatailById($_SESSION['customerId']);
       //dd($userInformation);
       
       return view('customer-profile',$userInformations);
   
   }

   public function adminProfile(){
     
        session_start();
     User::isSessionExist($_SESSION['adminId']);
     $userInformations= (new User)->getUserDeatailById($_SESSION['adminId']);
     //dd($userInformation); 
   
      return view('admin-profile',$userInformations);
   }

   public function logOut(){
     
     
       User::logOut();

   
     //echo $_SESSION['userId']; 
     return redirect('log-in');
   }
 


}