<?php
  // connect to database
  $user = 'root';
  $pass = '';
  $db = 'iat352_project';
  $connection = mysqli_connect('localhost',  $user,$pass,$db);

  // Test if connection succeeded
  if(mysqli_connect_errno()) {
      // if connection failed, print an error
      die("Database connection failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")"
        );
  }

?>
