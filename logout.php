<?php

$file = 'user.txt';
if($handle = fopen($file, 'w')) {

	fwrite($handle, '');
    $content = "";
    fwrite($handle, $content);
    fclose($handle);
} 

session_start();
unset($_SESSION["User"]);
unset($_SESSION["Name"]);
header("Location:index.php");


?>