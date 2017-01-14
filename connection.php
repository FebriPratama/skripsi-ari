<?php

error_reporting(E_ALL ^ E_DEPRECATED);

$server_name = "localhost";
$user_name = "root";
$password = "";
$database_name = 'food';


$con = mysql_connect($server_name, $user_name, $password)
or die ('Server Error : '.mysql_error());

mysql_select_db($database_name)
or die ('Database Error : Unable to select db');

mysql_query("SET NAMES 'utf8'");

?>