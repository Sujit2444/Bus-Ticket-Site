<?php

//get routes
 $router->get('Bus_Ticket','HomeController@setHome');
 


 $router->get('Bus_Ticket/sign-up','UserController@signUp');
 
 $router->get('Bus_Ticket/log-in','UserController@login');
 
 $router->get('Bus_Ticket/log-in','UserController@login');

 $router->get('Bus_Ticket/customer-profile','UserController@customerProfile');

 $router->get('Bus_Ticket/admin-profile','UserController@adminProfile');
 
 $router->get('Bus_Ticket/log-out','UserController@logOut');

 
 
 $router->get('Bus_Ticket/add-city','BusController@addCity');
 
 $router->get('Bus_Ticket/edit-city','BusController@editCity');

 $router->get('Bus_Ticket/remove-city','BusController@removeCity');


 
 $router->get('Bus_Ticket/add-board','BusController@addBoard');
 
 $router->get('Bus_Ticket/edit-board','BusController@editBoard');

 $router->get('Bus_Ticket/remove-board','BusController@removeBoard');
 

 
 $router->get('Bus_Ticket/add-coach','BusController@addCoach');

 $router->get('Bus_Ticket/edit-coach','BusController@editCoach');
  
 $router->get('Bus_Ticket/remove-coach','BusController@removeCoach'); 




$router->get('Bus_Ticket/get-coachSchedule','CoachScheduleController@getCoachSchedule');
 
$router->get('Bus_Ticket/getAll-coachSchedule','CoachScheduleController@getAllCoachSchedule');
$router->get('Bus_Ticket/selectedCoachSchedule','CoachScheduleController@selectedCoachSchedule');

$router->get('Bus_Ticket/selectedSeat','CoachScheduleController@selectedSeat');



$router->get('Bus_Ticket/selectedCoach','TicketController@selectedCoach');

$router->get('Bus_Ticket/check-out','TicketController@checkOut');

$router->get('Bus_Ticket/cancelBooking','TicketController@cancelBooking');

$router->get('Bus_Ticket/show-customer-reservation','TicketController@showCustomerReservation');



//post routes

$router->post('Bus_Ticket/searchCoachSchedule','HomeController@searchCoachSchedule');


 $router->post('Bus_Ticket/postSignUp','UserController@postSignUp');

 $router->post('Bus_Ticket/postLogin','UserController@postLogin');



 $router->post('Bus_Ticket/postAddCity','BusController@postAddCity');
 
 $router->post('Bus_Ticket/postSelectedCity','BusController@postSelectedCity');
 
 $router->post('Bus_Ticket/postEditCity','BusController@postEditCity');
 
 $router->post('Bus_Ticket/postRemoveCity','BusController@postRemoveCity');
 


 $router->post('Bus_Ticket/postAddBoard','BusController@postAddBoard');
 
 $router->post('Bus_Ticket/postSelectedBoard','BusController@postSelectedBoard');
 
 $router->post('Bus_Ticket/postEditBoard','BusController@postEditBoard');
 
 $router->post('Bus_Ticket/postRemoveBoard','BusController@postRemoveBoard');


 
 $router->post('Bus_Ticket/postAddCoach','BusController@postAddCoach');

 $router->post('Bus_Ticket/postSelectedCoach','BusController@postSelectedCoach');
 
 $router->post('Bus_Ticket/postEditCoach',
 	'BusController@postEditCoach');
 
 $router->post('Bus_Ticket/postRemoveCoach',
 	'BusController@postRemoveCoach');



 
 $router->post('Bus_Ticket/postCreateCoachSchedule',
 	'CoachScheduleController@postCreateCoachSchedule'); 

 $router->post('Bus_Ticket/saveCoachSchedule',
 	'CoachScheduleController@saveCoachSchedule');
 
 $router->post('Bus_Ticket/postShowDateCoachSchedule',
      'CoachScheduleController@postShowDateCoachSchedule');	  
 



 
 $router->post('Bus_Ticket/postBooking',
 	'TicketController@postBooking');

  $router->post('Bus_Ticket/confirmBooking',
 	'TicketController@confirmBooking'); 






  //dd($router->routes);




