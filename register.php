<!DOCTYPE HTML>  
<html>
<head>
  
<link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/main.css">
<style>

.error {color: #FF0000;}
.form_input input{
  border: 1px solid lightgray;
}

.form_input input:focus, input:hover, input:active, .column3 .btn:hover {
  border: 1px solid black;
}
</style>
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

<?php
// Reference from https://www.w3schools.com/php/php_form_complete.asp
$nameErr = $emailErr = $numberErr = $passwordErr = "";
$name = $email = $number = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["number"])) {
    $numberErr = "Phone number is required";
  } else {
    $number = test_input($_POST["number"]);
  }
  
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }
}

//Saving data to textfile https://www.dummies.com/programming/php/how-to-write-a-basic-text-file-in-php-for-html5-and-css3-programming/
$saveData = <<< HERE
$email|$password|$name|$number

HERE;
 $fp = fopen("data.txt", "a");
 fwrite($fp, $saveData);
 fclose($fp);

function test_input($data) {
  return $data;
}
?>
<div class="center">
<h2>Register</h2><br>
<p><span class="error"></span></p>
<form method="post" class="form_input center">  
  Name <br> <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail <br><input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Phone number <br> <input type="text" name="number" value="<?php echo $number;?>">
  <span class="error">* <?php echo $numberErr;?></span>
  <br><br>
  Password <br> <input type="text" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br> 

  <input type="submit" name="submit" value="Submit">  
</form>

</div>
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