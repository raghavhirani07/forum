<?php
  include'partials/_dbconnect.php';
  $userdublicate=false;
  $passname=false;
  $signup=false;
if(array_key_exists('signupname',$_POST)){
//  echo "<pre>";
//  print_r($_POST);
//  echo "</pre>";




 $username=$_POST['signupname'];
 $pass=$_POST['signuppass'];
 $cpass=$_POST['signupcpass'];


$sql="SELECT * FROM `users` WHERE  `user_name`='$username'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num == 0){

    if($pass == $cpass){
        $sql="INSERT INTO `users` ( `user_name`, `password`) VALUES ( '$username', '$pass');";
        $result=mysqli_query($conn,$sql);
         if($result){
            $signup=true;
         }
    }
    else
    {
      $passname=true;
    }
}
else
{
    $userdublicate=true;
}
}

?>