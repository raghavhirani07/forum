<?php


$username="root";
$password="";
$database="iforume";
$server="localhost";
$conn=mysqli_connect($server,$username,$password,$database);
if($conn){

}
else{
die("error".mysqli_connect_errno());
}
?>