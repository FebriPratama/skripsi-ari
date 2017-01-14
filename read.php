<?php
include_once("connection.php");
$query = $_POST["query"];

$result = mysql_query($query)
or die ("2".'Query Error : '.mysql_error());

$output = array();

while ($row = mysql_fetch_assoc($result, MYSQL_NUM))
{
	$output[] = $row;
}

print ('1');

for ($x = 0; $x < count($output); $x++)
{
	for ($y = 0; $y < count($output[$x]); $y++)
	{
		print ($output[$x][$y]);
		
		if ($y < count($output[$x]) - 1)
			print ('#');
	}

	if ($x < count($output) - 1)
		print ("@");
}

?>