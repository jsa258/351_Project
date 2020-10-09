<html>
<head>
<title> Login Page   </title>
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <!-- NAVIGATION STARTS -->

  <nav>
    <!--burger is the icon for the drop down menu-->
    <div class="burger">
      <div class="line1">
      </div>
      <div class="line2">
      </div>
      <div class="line3">
      </div>
    </div>

    <div class="logo">
      <a href="index.php">
        <header>XGAMES</header>
      </a>
    </div>

    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="products.php">Products</a></li>
      <?php 
        $file = 'user.txt';
        if($handle = fopen($file, 'r')) { // read this Hello World! from filetest.txt
           // fill in your own code. Hint! each character is 1 byte
            $content = fread($handle,12);
            fclose($handle);
        }
        if(trim(file_get_contents('user.txt')) == false){
         
         echo "<li><a href=\"login.php\">Login</a></li>";
        }else{
          echo "Welcome  $content";
          echo "<li><a href=\"logout.php\">Logout</a></li>";
        }

      ?>
    </ul>



  </nav>
  <!--link to script needed to create the drop down effect-->
  <script src="js/responsive.js"></script>

  <!-- NAVIGATION ENDS -->

  
  <div class="center"> 
  <a href="register.php">Register</a>

  </div>
  <div class="center">
<form action="" method="post">
    <table width="200" border="0">
  <tr>
    <td>  Email</td>
    <td> <input type="text" name="email" > </td>
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
</div>

<?php  session_start(); ?>

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

      echo "<br> Hi $email you have been logged in. <br>";
      ?> "Click here to <a href="logout.php" tite="Logout">Logout.<?php

  } else {
      echo "<div class=\"center\"> You have entered the wrong username or password. Please try again. </div>";
  }

}
?>

 <!--begin footer-->
 <div class="footer">
   <div class="inner-footer">

     <div class="footer-items">
       <h5> XGames </h5>
       <p> Description of the website</p>
     </div>
     <div class="footer-items">
       <div class="contact">
         <h6> Contact Us </h6>
         <span><i class="fas fa-envelope"></i> info@gmail.com</span>
         <i class="fas fa-phone"></i>604-232-3421
       </div>
     </div>

     <div class="footer-items">
       <div class="social">
         <h6> Social Media </h6>
         <a href="https://facebook.com"><i class="fab fa-facebook"></i></a>
         <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
         <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
       </div>
     </div>

     <div class="footer-items">
       <h6> Quick Links </h6>
       <ul>
         <li><a href="index.html">Home</a></li>
         <li><a href="products.html">Products</a></li>
       </ul>
     </div>
   </div>
   <div class="footer-bottom">
     Copyright &copy;
   </div>
 </div>
</body>
</html>


