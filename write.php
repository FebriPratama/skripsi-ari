<?php

include_once("connection.php");

$query = $_POST["query"];
$queries = explode("#",$query);

$res = array();

for ($x = 0; $x < count($queries); $x++)
{
	$queries[$x] = replace($queries[$x]);

	$result = mysql_query($queries[$x])
	or die ("2".'Query Error : '.mysql_error());
	
	$res[] = mysql_insert_id();
}

$res['length'] = count($res);

print ('1');
echo json_encode($res);

function replace($q)
{
	global $res;	

	$pos = strpos($q,'@');

	if ($pos !== false)
	{
		$pos2 = strpos($q, '@', $pos + 1);
		$sub = substr($q, $pos, $pos2 - $pos + 1);
		$num = substr($q, $pos + 1, $pos2 - $pos - 1);

		$q = str_replace($sub, $res[$num], $q);
	}

	return $q;
}

?>