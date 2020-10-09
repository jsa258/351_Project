<?php

$file = 'user.txt';
if($handle = fopen($file, 'w')) {

	fwrite($handle, '');
    $content = "";
    fwrite($handle, $content);
    fclose($handle);
} 

session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
header("Location:index.php");


?>