<html>
<head>
<title> Login Page   </title>
</head>
<body>
<form action="" method="post">
    <table width="200" border="0">
  <tr>
    <td>  UserName</td>
    <td> <input type="text" name="user-name" > </td>
  </tr>
  <tr>
    <td> PassWord  </td>
    <td><input type="password" name="pass-word"></td>
  </tr>
  <tr>
    <td> <input type="submit" name="login" value="LOGIN"></td>
    <td></td>
  </tr>
</table>
</form>
</body>
</html>

<?php  session_start(); ?>

<?php

if(isset($_POST['login']))   // it checks whether the user clicked login button or not
{
  $email = $_POST['user-name'];
  $password = $_POST['pass-word'];
  $userlist = file ('data.txt');

  $name = "";
  $number = "";

  $success = false;
  foreach ($userlist as $user) {
      $user_details = explode('|', $user);
      if ($user_details[0] == $email && $user_details[1] == $password) {
          $success = true;
          $name = $user_details[2];
          $number = $user_details[3];
          break;
      }
  }

  if ($success) {
      echo "<br> Hi $email you have been logged in. <br>";
      ?> "Click here to <a href="logout.php" tite="Logout">Logout.<?php

  } else {
      echo "<br> You have entered the wrong username or password. Please try again. <br>";
  }

}
?>
