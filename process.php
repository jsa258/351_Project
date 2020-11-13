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

                $nameQuery ="select name from users where email='".$_POST['email']."'";

                $findName = mysqli_query($connection, $nameQuery );


                // if($findName = mysqli_fetch_assoc($nameQuery)){
                //   $_SESSION['Name']=$findName['name'];
                //     echo $findName['name'];
                // }

                if( $findName ){
                    while( $row = mysqli_fetch_assoc( $findName ) ){
                        $_SESSION['Name']=$row['name'];
                    }
                }





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