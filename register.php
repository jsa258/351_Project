<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

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

<h2>Register Page</h2>
<p><span class="error"></span></p>
<form method="post">
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Phone number: <input type="text" name="number" value="<?php echo $number;?>">
  <span class="error">* <?php echo $numberErr;?></span>
  <br><br>
  Password: <input type="text" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>

  <input type="submit" name="submit" value="Submit">
</form>


</body>
</html>
