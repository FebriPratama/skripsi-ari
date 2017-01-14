<?php
include_once("connection.php");

$input = $_POST["input"];
$value = $_POST["value"];

$queryTrue = $_POST["queryTrue"];
$queryFalse = $_POST["queryFalse"];

$result = mysql_query($input)
or die ("2".'Input Query Error : '.mysql_error());

$output = mysql_result($result, 0);

if ($output === trim($value))
{
	$_POST["query"] = $queryTrue;
	include('write.php');
	print('5');
}
else
{
	$_POST["query"] = $queryFalse;
	include('write.php');
	print('6');
}

?>