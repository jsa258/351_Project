<?php

//unset the User and Name then redirect to index page
session_start();
unset($_SESSION["User"]);
unset($_SESSION["Name"]);
header("Location:index.php");


?>