<?php
$login1=false;
$notlogin=false;
include'partials/_dbconnect.php';
//  echo "<pre>";
//  print_r($_POST);
//  echo "</pre>";


if(array_key_exists('loginname',$_POST)){
    $username=$_POST['loginname'];
    $password=$_POST['loginpass'];
  $sql="SELECT * FROM `users` WHERE `user_name`='$username' AND `password`='$password'";
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
  $row=mysqli_fetch_assoc($result);

 if($num > 0){
     session_start();
     $_SESSION['username']=$username;
     $_SESSION['userid']=$row['user_id'];
     $_SESSION['loggedin']=true;
     $login1=true;
    //  w
    }
    else
    {
        $notlogin=true;
    }

}