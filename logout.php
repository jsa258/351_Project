<?php

//unset the User and Name then redirect to index page
session_start();
unset($_SESSION["User"]);
unset($_SESSION["Name"]);
unset($_SESSION["ID"]);
header("Location:index.php");


?>
