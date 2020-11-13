<!DOCTYPE php>
<html>
<head>
<title> Login Page   </title>
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/login.css">
  <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
</head>

<body>
  <!-- NAVIGATION STARTS -->
  <nav>
    <div class="logo">
      <a href="index.php">
        <header>XGAMES</header>
      </a>
    </div>

    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="product_page.php">Products</a></li>
      <li><a href="login.php">Login</a></li>
    </ul>
  </nav>

  <!-- NAVIGATION ENDS -->

    <!-- FORMS START-->
    <?php  session_start(); ?>

<div class="login-box">
  <div class="login-container">
<form action="process.php" method="post">
  <h2>Login</h2>
  <table width="200" border="0">
  <tr>
    <td> <label for="inputemail">Email</label></td>
    <td> <input type="text" name="email" > </td>
  </tr>
  <tr>
    <td><label for="inputpassword">Password</label></td>
    <td><input type="password" name="pass-word"></td>
  </tr>
  <tr>
    <td> <input type="submit" name="login" value="LOGIN" class="buy-btn1"></td>
    <td></td>
  </tr>
</table>
<div class="login">
<p> Don't have an account? <a href="register.php">Register here</a></p>
</div>
</form>
</div>
</div>

<?php

if(isset($_POST['login']))   // it checks whether the user clicked login button or not
{
  $email = $_POST['email'];
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
    $saveData = <<< HERE
    $name

    HERE;
     $fp = fopen("user.txt", "a");
     fwrite($fp, $saveData);
     fclose($fp);
     echo "<meta http-equiv=\"refresh\" content=\"1; URL=index.php\" />";


  } else {
      echo "<div class=\"center\"> You have entered the wrong username or password. Please try again. </div>";
  }

}
?>
  <!-- FORMS ENDS-->

<!--begin footer-->
<div class="footer">
  <div class="inner-footer">

    <div class="footer-items">
      <h2> XGAMES </h2>
      <p> Sells The Trendiest Video Games</p>
    </div>
    <div class="footer-items">
      <div class="contact">
        <h3> Contact Us </h3>
        <span><i class="fas fa-envelope"></i>xgames@gmail.com</span>
        <i class="fas fa-phone"></i>604-123-1244
      </div>
    </div>

    <div class="footer-items">
      <div class="social">
        <h3> Social Media </h3>
        <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
        <a href="https://facebook.com"><i class="fab fa-facebook"></i></a>
        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
      </div>
    </div>

    <div class="footer-items">
      <h3> Quick Links </h3>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="product_page.php">Products</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    Copyright &copy;
  </div>
</div>
</body>
</html>
