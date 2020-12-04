<?php 
require_once('connection.php');
session_start();
    if(isset($_POST['login']))
    {
        //Check if email and password field is empty
       if(empty($_POST['email']) || empty($_POST['pass-word']))
       {
           //If empty, shows error message on header
            header("location:login.php?Empty= Please enter a email address and password");
            echo 'Please enter a email address and password!';
            
       }
       else
       {
           //Verify password section. Code from https://www.youtube.com/watch?v=nkB7dSod4qw&ab_channel=DeveloperZone
           $email = $_POST['email'];
           $password = $_POST['pass-word'];

           //escape string for email and password
           $email = strip_tags(mysqli_real_escape_string($connection, trim($email)));
           $password = strip_tags(mysqli_real_escape_string($connection, trim($password)));

           //connect to database and run query to search for user by email
           $query="select * from users where email='".$_POST['email']."'";
             $result=mysqli_query($connection,$query);
             //fetching the password and storing name for session
             if(mysqli_num_rows($result)>0){
                 $row = mysqli_fetch_array($result);
                 $password_hash = $row['password'];
                 //verify password entered by user and encrypted password
                 if(password_verify($password,$password_hash)){
                     //store name into session and redirect user to index page
                     $_SESSION['Name']=$row['name'];
                     $_SESSION['ID']=$row['user_id'];    
                     $_SESSION['User']=$_POST['email'];                
                    header("location:index.php");
                 }else
                 {
                     //If incorrect password, shows error message on header
                     header("location:login.php?Invalid= Please Enter Correct User Name and Password ");
                     echo 'Please Enter Correct User Name and Password!';
     
                   }
             }else
            {
                //If incorrect password, shows error message on header
                header("location:login.php?Invalid= Please Enter Correct User Name and Password ");
                echo 'Please Enter Correct User Name and Password!';

              }
            }
            
       }
    else
    {
        //redirect user back to login page
        header("location:login.php?Error= Please log in before processing");
    }

?>