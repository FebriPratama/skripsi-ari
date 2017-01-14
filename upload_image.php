<?php

$image = $_POST["image"];
$name = $_POST["name"];

$decodedImage = base64_decode("$image");
file_put_contents("pictures/". $name. ".jpg", $decodedImage);

print ('1');

?>