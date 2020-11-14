<!DOCTYPE php>
<html>
<head>
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/login.css">
<link href="https://fonts.googleapis.com/css2?family=Nunito&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
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

<?php
// Reference from https://www.w3schools.com/php/php_form_complete.asp
$nameErr = $emailErr = $numberErr = $passwordErr = "";
$name = $email = $number = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //check each field. If empty, echo error message on form
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    if (!empty($_POST["email"])) {
      $email = ($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }
  }

  if (empty($_POST["number"])) {
    $numberErr = "Phone number is required";
  } else {
    $number = $_POST["number"];
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {

    if (!empty($_POST["password"])) {
    //Password Validation code from https://www.codexworld.com/how-to/validate-password-strength-in-php/?fbclid=IwAR3exHFhciFRFGQZRmKB80DrlNQNtc2leVnlnDqs0zSw5jL3hqn7Zt21n3M
        // Given password
        $password = ($_POST["password"]);
        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $passNumber    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        if(!$uppercase || !$lowercase || !$passNumber || !$specialChars || strlen($password) < 8) {
          $passwordErr = "Password should be at least 8 characters in length and <br> should include at least one upper case letter, one number, and one special character.";
        }else{
          $passwordErr = "Strong password";
        }
      }
      
  }
}
?>
    <!-- REGISTER FORM START-->
<div class="register-box">
  <div class="register-container">
<p><span class="error"></span></p>
<form method="post" class="form_input_center">
  <div class="register">
  <h2>Register</h2>
  <p> Already have an account? <a href="login.php">Login here</a></p>
  </div>

  <label for="inputname">Full name</label>
  <input type="text" class="form-text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br>
  <label for="inputemail">Email</label>
  <input type="text" class="form-text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br>
  <label for="inputemail">Phone Number</label>
  <input type="text" class="form-text" name="number" value="<?php echo $number;?>">
  <span class="error">* <?php echo $numberErr;?></span>
  <br>
  <label for="inputemail">Password</label>
  <input type="text" class="form-text" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br>
  <input type="submit" class="buy-btn1" name="submit" value="Submit">
</form>
</div>
</div>
    <!-- REGISTER FORM END-->


<?php
//connect to database
require_once('connection.php');
session_start();
if(isset($_POST['submit']))
    {
      //checks if fields are not empty
       if(!empty($_POST['name']) || !empty($_POST['email']) || !empty($_POST['number']) || !empty($_POST['password'])){


         

        //Password Validation code from https://www.codexworld.com/how-to/validate-password-strength-in-php/?fbclid=IwAR3exHFhciFRFGQZRmKB80DrlNQNtc2leVnlnDqs0zSw5jL3hqn7Zt21n3M
        // Given password
        $password = ($_POST["password"]);
        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $passNumber    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        if($uppercase || $lowercase || $passNumber || $specialChars || strlen($password) < 8) {

          //validate email before registering user in db
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          //Prevent same email and password for security issue
          if($email==$password){
            echo '<div class="password-msg">Password cannot be the same as email.</div>';
          }else{
        
            //run query in db to check if email existed
        $query="select * from users where email='".$_POST['email']."'";
        $check=mysqli_query($connection,$query);

        if(mysqli_fetch_assoc($check))
        {
          echo '<div class="account-msg">Account already exists!</div>';
        }else{

          $name = addslashes($_POST['name']);
          $email = addslashes($_POST['email']);
          $phone_no = addslashes($_POST['number']);
          $password = addslashes($_POST['password']);
          
          //add hash password to db
          $hash = password_hash($password, PASSWORD_DEFAULT);

        $query2= "INSERT INTO users (email, password, name, phone_no) VALUES (
          '{$email}', '{$hash}', '{$name}', '{$phone_no}')";


        $result=mysqli_query($connection,$query2);



        if($result)
        {
          //store email and name to session and echo success when added user to db
          $_SESSION['User']=$_POST['email'];
          $_SESSION['Name']=$_POST['name'];
          echo '<div class="password-msg">Register Successful!</div>';
          echo "<meta http-equiv=\"refresh\" content=\"2; URL=index.php\" />";
        }
      }
    }
    }
    }
       }
  }

?>


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
