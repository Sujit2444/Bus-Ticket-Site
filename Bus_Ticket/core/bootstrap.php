<?php

 use App\core\App;
 //use App\core\database\Connection;
 //use App\core\database\QueryBuilder;
 require'function.php';
 require 'core/database/Connection.php';
 require 'core/database/QueryBuilder.php';
 require 'core/Router.php';
 require 'core/Request.php';
 require 'core/App.php';


 require 'model/User.php';
 require 'model/City.php';
 require 'model/BoardingPoint.php';
 require 'model/Coach.php';
 require 'model/CoachSchedule.php';
 require 'model/Ticket.php';

 require 'controllers/HomeController.php';
 require 'controllers/UserController.php';
 require 'controllers/BusController.php';
 require 'controllers/CoachScheduleController.php';
 require 'controllers/TicketController.php';
 //$app;
 //$app['configs']=require 'config.php';

 //$app['database']=new QueryBuilder(Connection::make($app['configs']['database']));

 App::bind('configs',require 'config.php');
 App::bind('database',new QueryBuilder(Connection::make(App::get('configs')['database'])));


 // dd(App::$registry);

