<?php

include_once("connection.php");

$query = $_POST["query"];
$queries = explode("#",$query);

$image = $_POST["image"];
$name = $_POST["name"];

$res = array();

for ($x = 0; $x < count($queries); $x++)
{
	$queries[$x] = replace($queries[$x]);

	$result = mysql_query($queries[$x])
	or die ("2".'Query Error : '.mysql_error());
	
	$res[] = mysql_insert_id();
}

$imgName = replace($name);

$decodedImage = base64_decode("$image");
file_put_contents("pictures/". $imgName. ".jpg", $decodedImage);

print ('1'.$imgName);

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