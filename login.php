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
$emailErr = $passwordErr = "";
$useremail = $userpassword = "";

  
  if (empty($_POST["useremail"])) {
    $emailErr = "Email is required";
  } else {
    $useremail = test_input($_POST["useremail"]);
  }

  
  if (empty($_POST["userpassword"])) {
    $passwordErr = "Password is required";
  } else {
    $userpassword = test_input($_POST["userpassword"]);
  }


function test_input($data) {
    
  return $data;
  
}

$file = 'login.txt';
if($handle = fopen($file, 'r')) { // read this Hello World! from filetest.txt
	 // fill in your own code. Hint! each character is 1 byte
    $content = fread($handle,filesize("login.txt"));
    fclose($handle); 
    echo $content;
}
//print the string here


 $useremail = "";
 $userpassword = "";

 $login_info = "$useremail : $userpassword";

 $file = 'login.txt';
 if($handle = fopen($file, 'r')) {
   $content = fread($handle,filesize("login.txt"));

   if (stristr($file,$login_info)) {

    echo "logged in";
    }
    
     else {
    
    echo "$useremail";
    
     }

   fclose($handle);
}


 


?>

<h2>Login Page</h2>
<p><span class="error"></span></p>
<form method="post">  
  E-mail: <input type="text" name="useremail" value="<?php echo $useremail;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Password: <input type="text" name="userpassword" value="<?php echo $userpassword;?>">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br> 

  <input type="submit" name="submit" value="Submit">  
</form>


</body>
</html>