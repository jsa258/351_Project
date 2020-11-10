<?php 
require_once('connection.php');
session_start();
    if(isset($_POST['login']))
    {
       if(empty($_POST['email']) || empty($_POST['pass-word']))
       {
            header("location:login.php?Empty= Please enter a email address and password");
            
       }
       else
       {
            $query="select * from users where email='".$_POST['email']."' and password='".$_POST['pass-word']."'";
            $result=mysqli_query($connection,$query);

            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['email'];
                header("location:index.php");
            }
            else
            {
                header("location:login.php?Invalid= Please Enter Correct User Name and Password ");
            }
       }
    }
    else
    {
        echo 'Please log in before processing';
    }

?>