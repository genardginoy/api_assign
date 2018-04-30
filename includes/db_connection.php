<?php
/********************
****DB CONNECTION****
*********************/

//constant  variables
define("DB_SERVER","localhost");
define("DB_USER","root");
define("DB_PASSWORD","");
define("DB_NAME","api_assign");

//Connecting database
$db_connection=mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);

//Show error if db is failed to connect
if(mysqli_connect_errno()){
  die("Database connection failed". mysqli_connection_error()."(".mysqli_connect_errno().")");
}


?>